<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Schedule;
use App\Services\GoogleMeetService;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    protected $googleMeetService;

    public function __construct(GoogleMeetService $googleMeetService)
    {
        $this->googleMeetService = $googleMeetService;
    }

    public function show()
    {
        return view('admin.course.show');
    }

    public function add()
    {
        return view('admin.course.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'course_name'   => 'required|string|max:255',
            'short_desc'     => 'required|string',
            'course_type'   => 'required|in:online,offline',
            'grade_level'   => 'required|integer|min:1|max:12',
            'max_students'  => 'required|integer|min:1|max:1000',
            'start_date'    => 'required|date',
            'end_date'      => [
                'required',
                'date',
                'after:start_date',
                'after_or_equal:' . now()->addMonth()->toDateString()
            ],
            'price'         => 'required|numeric|min:1000|max:100000000',
            'image_course' => 'required|image|mimes:jpeg,png,jpg,gif',
            'schedules'     => 'required|array|min:1',
            'schedules.*.day_of_week' => 'required|integer|between:0,6',
            'schedules.*.start_time'  => 'required|date_format:H:i',
            'schedules.*.end_time'    => 'required|date_format:H:i|after:schedules.*.start_time',
        ]);

        $data = $request->all();
        $startDate = Carbon::parse($data['start_date']);
        $endDate = Carbon::parse($data['end_date']);
        $schedules = array_column($data['schedules'], null, 'day_of_week');

        // Xử lý Google Meet link trước khi transaction
        $meetingLink = null;
        if ($data['course_type'] == 'online') {
            $data['location'] = '';
            $meetingLink = $this->googleMeetService->createMeet($data['course_name'], $data['course_name'], $startDate);
            if (!$meetingLink) {
                return redirect()->route('admin.course.add')->with('fail', 'Có lỗi xảy ra, vui lòng thử tạo lại!');
            }
        }
        $imageCourseUrl = Cloudinary::upload($request->file('image_course')->getRealPath())->getSecurePath();
        if(!$imageCourseUrl){
            return redirect()->route('admin.course.add')->with('fail', 'Có lỗi xảy ra, vui lòng thử tạo lại!');
        }

        // Transaction để tạo lớp học và lịch học
        DB::transaction(function () use ($data, $meetingLink, $schedules, $startDate, $endDate, $imageCourseUrl) {
            $course = new Course();
            $course->fill([
                'name'   => $data['course_name'],
                'subject_id'    => 1,
                'course_type'   => $data['course_type'],
                'description'   => $data['description'] ?? '',
                'short_desc'    => $data['short_desc'] ?? '',
                'max_students'  => $data['max_students'],
                'is_active'     => 1,
                'grade_level'   => $data['grade_level'],
                'location'      => $data['location'],
                'google_meet_link'  => $meetingLink,
                'start_date'    => $data['start_date'],
                'end_date'      => $data['end_date'],
                'price'         => $data['price'],
                'image_url'     => $imageCourseUrl ?? null
            ]);
            $course->save();

            // Lưu lịch học
            $schedulesCourse = [];
            while ($startDate->lte($endDate)) {
                $dayOfWeek = $startDate->dayOfWeek;

                if (isset($schedules[$dayOfWeek])) {
                    $schedulesCourse[] = [
                        'course_id' => $course->id,
                        'date' => $startDate->format('Y-m-d'),
                        'day_of_week' => $dayOfWeek,
                        'start_time' => $schedules[$dayOfWeek]['start_time'],
                        'end_time' => $schedules[$dayOfWeek]['end_time'],

                    ];
                }
                $startDate->modify('+1 day');
            }
            DB::table('schedules')->insert($schedulesCourse);
        });
        return redirect()->route('admin.course.add')->with('status', 'Tạo lớp học thành công')->with('clearLocalStorage', true);
    }
}

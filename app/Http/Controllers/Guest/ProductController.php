<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $type = $data['type'] ?? '';
        $grade = $data['grade'] ?? '';
        $startDate = $data['start_date'] ?? '';
        $price = $data['price'] ?? '';
        $q = $data['q'] ?? '';
        $query = Course::query();

        if ($q) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        if ($type && $type != 'all') {
            $query->where('course_type', $type);
        }

        if ($grade && $grade != 'all') {
            $query->where('grade_level', $grade);
        }

        if ($startDate) {
            $query->where('start_date', '>=', $startDate);
        }

        if ($price && $price != 'all') {
            if ($price == 'under_1m') {
                $query->where('price', '<', 1000000);
            } elseif ($price == '1m_2m5') {
                $query->where('price', '>=', 1000000)->where('price', '<', 2500000);
            } elseif ($price == '2m5_5m') {
                $query->where('price', '>=', 2500000)->where('price', '<=', 5000000);
            } elseif ($price == 'above_5m') {
                $query->where('price', '>', 5000000);
            }
        }

        // Phân trang
        $courses = $query->paginate(10)->appends(request()->query());
        return view('user.product.main', compact('courses', 'type', 'grade', 'startDate', 'price', 'q'));
    }


    public function detail(Request $request, $id)
    {
        $courseId = (int) $id;
        $course = Course::find($courseId);

        if (!$course) {
            abort(404, 'Khóa học không tồn tại');
        }

        $date = Carbon::parse($course->start_date);

        // Giữ nguyên giá trị của $date bằng cách tạo bản sao
        $startOfWeek = $date->copy()->startOfWeek()->toDateString();
        $endOfWeek = $date->copy()->endOfWeek()->toDateString();

        // Lấy danh sách lịch học trong tuần của khóa học
        $schedules = Schedule::where('course_id', $courseId)
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->orderBy('date')
            ->get();

        $days = [
            1 => 'Thứ 2',
            2 => 'Thứ 3',
            3 => 'Thứ 4',
            4 => 'Thứ 5',
            5 => 'Thứ 6',
            6 => 'Thứ 7',
            0 => 'Chủ nhật'
        ];
        return view('user.product.detail', compact('course', 'schedules', 'days'));
    }
}

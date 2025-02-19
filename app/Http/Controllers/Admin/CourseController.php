<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GoogleMeetService;
use Illuminate\Http\Request;

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
        $meetingLink = $this->googleMeetService->createMeet(
            'Lớp học Laravel',
            'Buổi học Laravel 11 về Google Meet',
            now()->addMinutes(10)->toIso8601String(),
            now()->addHours(1)->toIso8601String()
        );
        if(!$meetingLink){
            return redirect()->route('google.auth');
        }
        return response()->json(['meet_link' => $meetingLink]);
    }
}

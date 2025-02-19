<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use App\Http\Controllers\Controller;
use App\Services\GoogleMeetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GoogleMeetController extends Controller
{
    // protected $googleMeetService;

    // public function __construct(GoogleMeetService $googleMeetService)
    // {
    //     $this->googleMeetService = $googleMeetService;
    // }

    // public function createMeet()
    // {
    //     $meetingLink = $this->googleMeetService->createMeet(
    //         'Lớp học Laravel',
    //         'Buổi học Laravel 11 về Google Meet',
    //         now()->addMinutes(10)->toIso8601String(),
    //         now()->addHours(1)->toIso8601String()
    //     );

    //     return response()->json(['meet_link' => $meetingLink]);
    // }

    // public function createMeet(Request $request)
    // {
    //     $client = new Client();
    //     $client->setClientId(config('google.client_id'));
    //     $client->setClientSecret(config('google.client_secret'));
    //     $client->setRedirectUri(config('google.redirect_uri'));

    //     $token = Session::get('google_token');
    //     $client->setAccessToken($token);

    //     if ($client->isAccessTokenExpired()) {
    //         return redirect()->route('google.auth');
    //     }

    //     $service = new Calendar($client);

    //     $event = new Event([
    //         'summary' => 'Lớp học online',
    //         'start' => ['dateTime' => '2025-02-20T10:00:00+07:00'],
    //         'end' => ['dateTime' => '2025-02-20T11:00:00+07:00'],
    //         'conferenceData' => [
    //             'createRequest' => [
    //                 'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
    //                 'requestId' => 'random-' . time(),
    //             ],
    //         ],
    //     ]);

    //     $calendarId = 'primary';
    //     $event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);

    //     return response()->json([
    //         'meet_link' => $event->getHangoutLink(),
    //         'event_id' => $event->getId(),
    //     ]);
    // }
}

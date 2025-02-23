<?php

namespace App\Services;

use Carbon\Carbon;
use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventConferenceData;
use Illuminate\Support\Facades\Session;

class GoogleMeetService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(config('google.client_id'));
        $this->client->setClientSecret(config('google.client_secret'));
        $this->client->setRedirectUri(config('google.redirect_uri'));
        $this->client->setScopes(config('google.scopes'));
        $this->client->setAccessType('offline');
    }


    public function createMeet($summary, $description, $date)
    {
        if (!$this->authenticateGoogle()) {
            return false;
        }

        $service = new Calendar($this->client);
        $calendarId = 'primary';

        // Chuyển đổi startDate & endDate về Asia/Ho_Chi_Minh (tránh sửa đổi trực tiếp)
        $startDate = Carbon::parse($date, 'Asia/Ho_Chi_Minh')->copy();
        $endDate = Carbon::parse($date, 'Asia/Ho_Chi_Minh')->copy();

        // Đảm bảo endDate luôn sau startDate (nếu chưa có sẵn)
        if ($endDate <= $startDate) {
            $endDate = $startDate->copy()->addHours(2);
        }

        $event = new Event([
            'summary'     => $summary,
            'description' => $description,
            'start'       => [
                'dateTime' => $startDate->toRfc3339String(),
                'timeZone' => 'Asia/Ho_Chi_Minh'
            ],
            'end'         => [
                'dateTime' => $endDate->toRfc3339String(),
                'timeZone' => 'Asia/Ho_Chi_Minh'
            ],
            'conferenceData' => [
                'createRequest' => [
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                    'requestId'             => uniqid()
                ]
            ]
        ]);

        $event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
        return $event->getHangoutLink();
    }


    /**
     * Kiểm tra và xác thực Google API token
     */
    private function authenticateGoogle()
    {
        $token = Session::get('google_token');
        if (!$token) {
            return false;
        }
        $this->client->setAccessToken($token);
        if ($this->client->isAccessTokenExpired()) {
            return false;
        }
        return true;
    }


    /**
     * Format datetime theo chuẩn Google API
     */
    // private function formatDateTime($date, $time)
    // {
    //     return Carbon::parse($date->format('Y-m-d') . ' ' . $time, 'Asia/Ho_Chi_Minh')->toRfc3339String();
    // }
}

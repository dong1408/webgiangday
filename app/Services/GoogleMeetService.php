<?php

namespace App\Services;


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

    public function createMeet($summary, $description, $startTime, $endTime)
    {
        $token = Session::get('google_token');
        if($token == null){
            return false;            
        }
        $this->client->setAccessToken($token);
        if ($this->client->isAccessTokenExpired()) {
            return false;
        }

        $service = new Calendar($this->client);

        $event = new Event([
            'summary'     => $summary,
            'description' => $description,
            'start'       => ['dateTime' => $startTime, 'timeZone' => 'Asia/Ho_Chi_Minh'],
            'end'         => ['dateTime' => $endTime, 'timeZone' => 'Asia/Ho_Chi_Minh'],
            'conferenceData' => [
                'createRequest' => [
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                    'requestId'             => uniqid()
                ]
            ]
        ]);

        $calendarId = 'primary';
        $event = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
        return $event->getHangoutLink();
    }
}

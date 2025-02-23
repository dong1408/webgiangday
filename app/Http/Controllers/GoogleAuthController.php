<?php

namespace App\Http\Controllers;

use Google\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class GoogleAuthController extends Controller
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
        // $this->client->setConfig('approval_prompt', null);
    }

    public function redirectToGoogle()
    {
        $authUrl = $this->client->createAuthUrl();
        // $authUrl .= '&prompt=select_account'; 
        return redirect()->away($authUrl);
    }


    public function handleGoogleCallback(Request $request)
    {
        $token = $this->client->fetchAccessTokenWithAuthCode($request->code);
        Session::put('google_token', $token);
        return redirect()->route('admin.course.add');
    }

    public function checkGoogleToken()
    {
        $accessToken = session('google_token');
        if($accessToken == null){
            return response()->json(['valid' => false, 'message' => 'Token không tồn tại'], 401);            
        }
        $this->client->setAccessToken($accessToken);
        if ($this->client->isAccessTokenExpired()) {
            return response()->json(['valid' => false, 'message' => 'Token hết hạn'], 401);
        }
        return response()->json(['valid' => true, 'message' => 'Token hợp lệ cccccc']);
    }
}

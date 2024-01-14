<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DailyAirdropController extends Controller
{
    public function get(Request $request){
       
        $token = session('user')['token'];
        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
        $response = json_decode(Http::withToken($token)->acceptJson()->get($baseUrl.'ads/daily'),true);
             //dump($response);
             
        if($response['status']){
            // session(['user'=>['status-message'=>$response['message']]]);
            session()->flash('success', $response['message']);
        } else {
            session()->flash('error',$response['message']);
        }

        return view('daily-airdrop.all-daily-airdrop-ads',$response);
        //return redirect(url('inapp-ads'));
    }


    public function delete(Request $request){
        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
        $response = json_decode(Http::delete($baseUrl.'ads/inapp/'),true);
        dump($response);
    }

}
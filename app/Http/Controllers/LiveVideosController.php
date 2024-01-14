<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LiveVideosController extends Controller
{
    public function create(Request $request){
       
      
        $body =[];
        //~ print_r($deviceToken);
        $body['name'] = $request->all()['name'];
        $body['link'] = $request->all()['link'];
        $body['playlist_id'] = $request->all()['playlist_id'];
       
        $token = session('user')['token'];
        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
    
        $response = json_decode(Http::withToken($token)->acceptJson()
        ->post($baseUrl.'live',$body),true);    
        
            //dump($response);
            // print_r($response);  

        if($response['status']){
            session()->flash('success',$response['message']);
           
           
        } else {
            session()->flash('error',$response['message']);
        } 
        return redirect(url('dashboard'));
    }

    public function get(Request $request){
       
        $token = session('user')['token'];
        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
        $response = json_decode(Http::withToken($token)->acceptJson()->get($baseUrl.'ads/live'),true);
             //dump($response); 
             
        if($response['status']){
            // session(['user'=>['status-message'=>$response['message']]]);
            session()->flash('success', $response['message']);
        } else {
            session()->flash('error',$response['message']);
        }

        return view('live-video.all-live-video-ads',$response);
        //return redirect(url('inapp-ads'));
    }


    public function delete(Request $request){
        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
        $response = json_decode(Http::delete($baseUrl.'ads/live/'),true);
        dump($response);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideosController extends Controller
{
    public function create(Request $request){
       
      
        $body =[];
        //~ print_r($deviceToken);
        $body['name'] = $request->all()['name'];
        $body['video_url'] = $request->all()['video_url'];
        $body['playlist_id'] = $request->all()['playlist_id'];
        if($request->all()['is_published']){
            $body['is_published'] = true;
        } else {
            $body['is_published'] = false;
        }
       
        $token = session('user')['token'];
        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
    
        $response = json_decode(Http::withToken($token)->acceptJson()
        ->post($baseUrl.'videos',$body),true);    
        
            dump($response); 
            // print_r($response);  

        if($response['status']){
            session(['user'=>['status-message'=>$response['message']]]);
            session()->flash('success', $response['message']);
            
        } else {
            session()->flash('error',$response['message']);
        }
        return redirect(url('dashboard'));
    }
}

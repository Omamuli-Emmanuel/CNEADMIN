<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdsController extends Controller
{
    public function create(Request $request){
        // dump($request->file('ad_image'));
        $adType = $request->all()['type'];
        $body =[];
        //~ print_r($deviceToken);
        $body['title'] = $request->all()['title'];
        $body['priority'] = $request->all()['priority'];
        $body['timer'] = $request->all()['timer'];
        $body['link'] = $request->all()['link'];
        $body['ad_image'] = $request->file('realPath').$request->file('originalName');
        $token = session('user')['token'];
        echo 'Attempting to create an in App Ad<br><br>';
        
        // $body['ad_image'] = $request->all();

        echo '<br><br><b class="mt-4">This is the payload from the form</b>';
        dump($body);

        echo '<br><br><b>This is the token from the login response -> $response["data"]["attributes"]["token"]</b>
        ';
        dump(session('user')['token']);

        
           
        if ($request->hasFile('ad_image') && $request->file('ad_image')->isValid()) {
            
            // get Illuminate\Http\UploadedFile instance
            $image = $request->file('ad_image');
            $body['ad_image']=$image;
            // echo $image;
            dump($image);
            $baseUrl = env('API_BASE_URL');
            // dump($baseUrl);
            
            if($adType == 'inApp'){
                $response = json_decode(Http::withToken($token)->acceptJson()->attach(
                'ad_image', file_get_contents($image),'image,jpg')->post($baseUrl.'ads/inapp',$body),true);
            } elseif($adType=='airDrop'){
                $response = json_decode(Http::withToken($token)->acceptJson()->attach(
                    'ad_image', file_get_contents($image),'image,jpg')->post($baseUrl.'ads/daily',$body),true);    
            }
                // dump($response);
            if($response['status']){
                session(['user'=>['status-message'=>$response['message']]]);
                session()->flash('success', $response['message']);
                
            } else {
                session()->flash('error',$response['message']);
            }
            return redirect(url('dashboard'));
        } 
        // return $request;
    }
}

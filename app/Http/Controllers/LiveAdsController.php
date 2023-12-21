<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LiveAdsController extends Controller
{
    public function create(Request $request){
       
      
        $body =[];
        //~ print_r($deviceToken);
        $body['title'] = $request->all()['title'];
        $body['priority'] = $request->all()['priority'];
       
        $body['ad_side_image'] = $request->file('realPath').$request->file('originalName');
        $token = session('user')['token'];

        
        // $body['ad_image'] = $request->all();

        // echo '<br><br><b class="mt-4">This is the payload from the form</b>';
        // dump($body);

        // echo '<br><br><b>This is the token from the login response -> $response["data"]["attributes"]["token"]</b>
        // ';
        // dump(session('user')['token']);

        
           
        if ($request->hasFile('ad_side_image') && $request->file('ad_side_image')->isValid()) {
            
            // get Illuminate\Http\UploadedFile instance
            $side_image = $request->file('ad_side_image');
            $body['ad_image']=$side_image;
            // echo $image;
            
        } 
        if ($request->hasFile('ad_bottom_image') && $request->file('ad_bottom_image')->isValid()) {
            
            // get Illuminate\Http\UploadedFile instance
            $bottom_image = $request->file('ad_bottom_image');
            $body['ad_bottom_image']=$bottom_image;
                  
        } 

        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
    
        $response = json_decode(Http::withToken($token)->acceptJson()->attach(
                'ad_side_image', file_get_contents($side_image),'side-image.png')
                ->attach('ad_bottom_image', file_get_contents($bottom_image),'bottom-image.png')->post($baseUrl.'ads/live',$body),true);    
        
            // dump($response);
            // print_r($response); 
        if($response['status']){
            // session(['user'=>['status-message'=>$response['message']]]);
            session()->flash('success', $response['message']);
            
        } else {
            session()->flash('error',$response['message']);
        }
        return redirect(url('dashboard'));
    }
}

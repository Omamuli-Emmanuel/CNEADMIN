<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ApiLoginController extends Controller
{
  public function login(Request $request)
  {
    // dd(session());
    if(!session('logged_in')){
      // dd($request->all());
     
      
      $deviceName = 'Postman Desktop Client';

        $body =[];
        //~ print_r($deviceToken);
        $body['email'] = $request->all()['email'];
        $body['password'] = $request->all()['password'];
        // $body['device_token'] = $request->all()['_token'];
        $body['device_token'] = '<Valid_FCM_Device_Token_Goes_Here>';
        $body['device_name'] = $deviceName;
      
      
      //$response = Http::withOptions([
        //      'debug' => true,
        //      'verify' => false,
        //  ])->post('https://dev.coinnewsextratv.com/api/v1/',$body);
        $baseUrl = 'https://dev.coinnewsextratv.com/api/v1/';
        $response = json_decode(Http::post($baseUrl.'auth/login',$body),true);
      
      
      if($response['status'] && $response['message'] == 'User Login successful.'){
        $user = $response['data']['attributes'];
        session(['role'=>'admin','logged_in'=>true,'user'=>$response['data']['attributes']]);
        session()->put('user', $user);
        session()->put('role', 'admin');
        session()->put('logged_in', true);
     

        session()->flash('success',$response['message']);

        echo '<h4>This is the response on succesful login';
        session()->put('role', 'admin');
        // dump(session()->all()); 
        // dump(session('logged_in')); 
        // session(['user'=>['status-message'=>$response['message']]]);
        

      } else {
        session()->flash('error',$response['message']);
        echo $response['message'];
      }
      return redirect(url('/dashboard'));
    } else {
       return redirect(url('/'));
    }
  }

  public function logout(Request $request)
  {
    
      $request->session()->invalidate();
  
      $request->session()->regenerateToken();
  
      return redirect('/');
  }
}

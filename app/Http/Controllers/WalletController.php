<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WalletController extends Controller
{
    public function create(Request $request){
       
      
        $body =[];
        //~ print_r($deviceToken);
        $body['amount'] = $request->all()['amount'];
        $body['type'] = $request->all()['type'];
        $body['email'] = $request->all()['email'];
    
        $body['title'] =  'Airdrop';
        $body['description'] =  'Bonus for airdrop';
    
        $token = session('user')['token'];
        $baseUrl = env('API_BASE_URL');
        // dump($baseUrl);
    
        $response = json_decode(Http::withToken($token)->acceptJson()
        ->post($baseUrl.'admin/wallet/update',$body),true);    
        
            // dump($response); 
            // print_r($response);  

        if($response['status']){
            session()->flash('success',$response['message']);

            
        } else {
            session()->flash('error',$response['message']);
        }
        return redirect(url('dashboard'));
    }
}

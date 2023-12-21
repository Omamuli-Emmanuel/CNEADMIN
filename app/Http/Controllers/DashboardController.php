<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $name = session('firstName') ? session('firstName') : session('lastName');
        if(session('logged_in')){
            return view('dashboard.index',['name'=>$name]);
        } else {
            return redirect(url('logout'));
        }
    }
}

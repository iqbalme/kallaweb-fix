<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRedirect extends Controller
{
    public function index(){
        dd('testigg');
        return redirect()->route('dashboard.admin');
    }
}

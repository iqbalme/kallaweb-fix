<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubdomainController extends Controller
{
    public function getSubdomain($subdomain){
        return $subdomain;
    }
}

<?php

namespace App\Http\Controllers\DevLanding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevLandingController extends Controller
{
    public function index()
    {
        return view('LandingPage.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUSController extends Controller
{
    public function index(){
        return view('Client.about_us');
    }
}

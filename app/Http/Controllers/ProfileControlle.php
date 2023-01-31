<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileControlle extends Controller
{
    public function view()
    {
        return view('layouts.account');
    }
}

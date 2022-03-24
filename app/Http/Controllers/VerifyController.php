<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function index() {
        if (Auth::user()->user_verified) {
            return redirect()->route('home');
        }
        return view('verify');
    }
}

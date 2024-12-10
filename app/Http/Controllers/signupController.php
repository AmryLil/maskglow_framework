<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signupController extends Controller
{
    /**
     * Menampilkan form sign up.
     */
    public function showSignupForm()
    {
        return view('signup');  // Hanya menampilkan view signup
    }
}

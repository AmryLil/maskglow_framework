<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Menampilkan form login tanpa ada logika login
    public function showLoginForm()
    {
        return view('login');  // Hanya menampilkan view login
    }
}

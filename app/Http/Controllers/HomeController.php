<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function login(){
        return view('auth/login');
    }
    public function register(){
        return view('auth/register');
    }
    public function dashboardAdmin(){
        return view('dashboard/register');
    }
}

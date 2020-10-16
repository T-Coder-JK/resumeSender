<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('Dashboard', compact('user'));
    }

    /**
     * Get request and passing user information
     *
     * @return User
     * */
    public function getUser(){
        $user= auth()->user();
        return $user;
    }

    /**
     * Get request and passing application info
     *
     * @return array
     * */
    public function getApplicationInfo(){
        $applications= auth()->user()->application->toArray();
        $result = [];
        $appliedNum = 0;
        $ongoingNum = 0;
        return findLatestDate($applications,'created_at');
    }
}

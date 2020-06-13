<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(User $user){

        return view('Applications.newApplication', compact('user'));
    }
}

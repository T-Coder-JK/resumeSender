<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmailTemplatesController extends Controller
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



    public function index(){
        $user = Auth::user();
        return view('emailTemplates', [
            'user' => $user,
        ]);
    }
}

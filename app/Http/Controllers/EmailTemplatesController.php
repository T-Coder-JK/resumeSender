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
        return view('emailTemplates.index', [
            'user' => $user,
        ]);
    }

    public function create(){
        return view('emailTemplates.create');
    }

    /**
     * Create a New EmailTemplate Data
     */
    public function store(){
        $data = request()->validate([
            'title'=> 'required',
            'content' => 'required'
            ]);
        auth()->user()->emailTemplate()->create($data);
        return redirect()->route('emailTemplates');
    }

    /**
     * Show Selected Email Template
     * @param $template_id
     * @return view
     */
    public function show($template_id){
        $template = auth()->user()->emailTemplate()->findOrFail($template_id);
        return view('emailTemplates.show',[
            'template' => $template,
        ]);
    }

    public function load($template_id){
        return $template = auth()->user()->emailTemplate()->findOrFail($template_id)->content;
    }

}

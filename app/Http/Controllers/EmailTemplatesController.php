<?php

namespace App\Http\Controllers;
use App\EmailTemplates;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

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

    /**
     * Show all the email templates of the user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(){
        $user = Auth::user();
        return view('emailTemplates.index', [
            'user' => $user,
        ]);
    }

    /**
     * Create a new email template view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('emailTemplates.create');
    }

    /**
     * Store new created email template into database
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

    /**
     * Update edited email template into database
     * @param EmailTemplates $templateId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function update($templateId, Request $request){
        $template = EmailTemplates::findOrFail($templateId);
        $template->content = $request->templateContent;
        $template->save();
        return response()->json('Success', 200);
    }

}

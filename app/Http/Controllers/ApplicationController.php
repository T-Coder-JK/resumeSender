<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Application;
use function PHPSTORM_META\type;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formView(User $user){

        return view('applications.new', compact('user'));
    }


    public function create(Request $request){
        $request->validate([
            'company'=>'required|string',
            'position'=>'required',
            'address'=>'required',
            'email'=>'required|email',
            'job_ad'=>'required|url',
            'salary'=>'numeric',
            'emailTemplate'=>'integer|exists:App\EmailTemplates,id',
            'job_type'=>'required|string',
            'personal_rank'=>'required|integer',
            'possibility'=>'required|integer',
            'description'=>'max:1020'
        ]);
        $company_data = [
            'company_name'=>$request->company,
            'address'=>$request->address,
            'contact'=>$request->contact
        ];
        $application_data = [
            'job_ad'=>$request->job_ad,
            'job_title'=>$request->position,
            'job_type'=>$request->job_type,
            'salary'=>$request->salary,
            'additional_description'=>$request->description,
            'email_templates_id'=>$request->emailTemplate,
            'personal_rank'=>$request->personal_rank,
            'possibility'=>$request->possibility,
        ];
        $company = Company::firstOrNew(['company_name'=>$company_data['company_name'], 'address'=>$company_data['address']]);
        if($company->exists){
            $application_data['company_id']=$company->id;
            $application = auth()->user()->application()->create($application_data);

        }else{
            $company = $company->create($company_data);
            $application_data['user_id'] = auth()->user()->id;
            $application = $company->application()->create($application_data);

        }

        return view('applications.preview', compact('application'));

    }

    /**
     * replace the placeholders in content with given variable
     *
     * @return mixed|string
     */
    protected function parseContent($content, $replacement) {

        foreach ($replacement as $key => $value) {
            $content = str_replace("%{$key}%", $value, $content);
        }

        return $content;
    }
}

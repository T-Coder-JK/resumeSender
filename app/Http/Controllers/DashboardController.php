<?php

namespace App\Http\Controllers;


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
     * Get request and passing application info
     *
     * @return array
     * */
    public function getApplicationInfo(){
        $result = [];
        $applications= auth()->user()->application;
        $applied = $applications->where('applied_at',!null);
        $result['applied']['num'] = sizeof($applied);
        if (sizeof($applied) >0){
            $result['applied']['date'] = findLatestDate($applied, 'applied_at', 'd F Y');
        }else{
            $result['applied']['date'] = null;
        }
        $ongoing = $applications->where('applied_at',null);
        $result['ongoing']['num'] = sizeof($ongoing);
        if (sizeof($ongoing)>0){
            $result['ongoing']['date'] = findLatestDate($ongoing,'updated_at','d F Y');
        }else{
            $result['ongoing']['date'] = null;
        }

        return $result;
    }

    public function showView($name){
        return $name;
    }
}

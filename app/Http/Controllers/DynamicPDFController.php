<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class DynamicPDFController extends Controller
{

    //TODO: Find other functionality to implement DynamicPDFController
/*    function index(){
        $convert_data = DB::table('email_templates')->where('id','=','3')->get('content');

//        echo $convert_data[0]->content;
        return $this->pdf($convert_data[0]->content);
//        return view('pdf.emailPDF', [
//            'convert_data' => $convert_data[0]->content,
//        ]);
    }

    function pdf($convert_html){

//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($convert_html);
//        $pdf->render();

        $pdf = PDF::loadHTML($convert_html);
        $pdf->setOptions(['isHtml5ParseEnable'=> true]);
        return $pdf->download('EmailTemp.pdf');
    }*/
}

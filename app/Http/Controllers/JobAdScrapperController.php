<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class JobAdScrapperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = 'https://www.yeeyi.com/bbs/forum.php?mod=viewthread&tid=4746190';
        $response = Http::withHeaders([
            'headers' => [
                'Content-Type'=>'application/x-www-form-urlencoded;charset=utf-8',
                'enctype'=>'multipart/form-data',
                'X-Requested-With' => 'XMLHttpRequest',
                'Accept-Language' => 'zh-CN,zh;q=0.9,en;q=0.8,sm;q=0.7'
            ]
        ])->get($url);
        $encode = mb_detect_encoding($response->body(), ["ASCII", 'UTF-8', "GB2312", "GBK", 'BIG5']);
        $content = mb_convert_encoding($response->body(),'UTF-8', $encode);
        dump($content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

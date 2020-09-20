<?php

namespace App\Http\Controllers;

use App\AdSetting;
use Illuminate\Http\Request;

class AdSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ad_setting.index', [

            'adSettings' => AdSetting::get()

        ]);
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
        $request->validate([

            'app_id' => 'nullable|max:255',
            'publisher_id' => 'required|max:255',

        ]);

        $adSettingIds = AdSetting::pluck('id');

        if ($request->status == 1){
            AdSetting::whereIn('id', $adSettingIds)->update([
               'status' => 0
            ]);
        }


        AdSetting::where('id', $id)->update([

            'app_id' => $request->app_id,
            'publisher_id' => $request->publisher_id,
            'status' => $request->status,

        ]);

        return redirect()->back()->with('success', 'Ad Setting Update Successful.');
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

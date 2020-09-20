<?php

namespace App\Http\Controllers\Api;

use App\AdSetting;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdSettingCollection;
use App\Http\Resources\AdSettingResources;
use Illuminate\Http\Request;

class AdSettingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adSettings = new AdSettingCollection(AdSetting::get());

        return response()->json([
            'success' => true,
            'message' => "Data Get Successful",
            'data' => $adSettings
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adSetting = AdSetting::find($id);

        return new AdSettingResources($adSetting);
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

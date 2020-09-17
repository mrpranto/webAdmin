<?php

namespace App\Http\Controllers;

use App\AdStatus;
use App\AdStatusDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adStatuses = AdStatus::get();
        return view('ad_status.index',compact('adStatuses'));
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
            'banner_id' => 'required|max:255',
            'interstitial_id' => 'required|max:255',
            'native_id' => 'required|max:255',

        ]);

        if (AdStatus::find($id)->ad_status_details == null){

            AdStatusDetails::create([

                'ad_status_id' => $id,
                'app_id' => $id == 2 && $request->app_id == "" ? Str::random(32) : $request->app_id ,
                'banner_id' => $request->banner_id ,
                'interstitial_id' => $request->interstitial_id ,
                'native_id' => $request->native_id ,

            ]);
        }else{

            AdStatus::find($id)->ad_status_details->update([

                'app_id' => $id == 2 && $request->app_id == "" ? Str::random(32) : $request->app_id ,
                'banner_id' => $request->banner_id ,
                'interstitial_id' => $request->interstitial_id ,
                'native_id' => $request->native_id ,

            ]);

        }



        return redirect()->back()->with('success', 'Ad Status Updated Successful.');
    }

    public function onAdStatus($id)
    {
        $oldAdStatus = AdStatus::pluck('id');

        AdStatus::whereIn('id', $oldAdStatus)->update([

            'status' => 0

        ]);

        AdStatus::find($id)->update([

            'status' => 1

        ]);



        return redirect()->back()->with('success', 'Ad Status On Successful.');
    }

    public function offAdStatus($id)
    {

        AdStatus::find($id)->update([

            'status' => 0

        ]);


        return redirect()->back()->with('success', 'Ad Status Off Successful.');
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

<?php

namespace App\Http\Controllers;

use App\new_version;
use Illuminate\Http\Request;

class NewVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newVersion.index', [

           'newVersion' => new_version::first()

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

            'version_title' => 'required|max:255',
            'new_features' => 'required',
            'version_code' => 'required|numeric',

        ]);

        new_version::where('id', $id)->update([

            'version_title' => $request->version_title,
            'new_features' => $request->new_features,
            'version_code' => $request->version_code,
            'enable' => $request->enable ?: 0,

        ]);

        return redirect()->back()->with('success', 'New Version Data update successful');

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

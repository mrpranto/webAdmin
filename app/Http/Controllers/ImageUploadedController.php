<?php

namespace App\Http\Controllers;

use App\Images;
use Illuminate\Http\Request;

class ImageUploadedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Images::paginate(100);

        return view('image.index', compact('images'));
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

        $request->validate([

            'image.*' => 'required|image'

        ]);

        foreach ($request->image ?: [] as $key => $value){

            $image = $request->file('image')[$key];
            $filePath = "";
            if (isset($image)) {
                $fileName = uniqid().'.'.$image->getClientOriginalExtension();
                $directory = './uploads/images/';
                $image->move($directory,$fileName);
                $filePath = $directory.$fileName;
            }

            Images::create([

                'image_path' => $filePath

            ]);

        }

        return redirect()->back()->with('success', 'Image Uploaded Successful.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $image = Images::findOrFail($id);

        @unlink($image->image_path);

        $image->delete();

        return redirect()->back()->with('success', 'Image Delete Successful.');

    }
}

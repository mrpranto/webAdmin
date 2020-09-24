<?php

namespace App\Http\Controllers;

use App\Ads;
use App\customize_banner;
use App\DisplayType;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ads.index',[

            'display_types' => DisplayType::pluck('name', 'id'),
            'ads' => Ads::get(),

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

            'admob_id' => "nullable|max:255",
            'fb_id' => "nullable|max:255",
            'display_type' => "nullable|max:255",
            'click_between' => "nullable|max:255",

            'banner_image' => "image|dimensions:width=320,height=100",
            'banner_link' => "required_if:customize_banner,1",
            'banner_title' => "required_if:customize_banner,1",

        ]);

        $ads = Ads::findOrFail($id);


        if ($request->customize_banner == 1){

            $customizeBanner = customize_banner::where('ads_id', $id)->first();

            $image = $request->file('banner_image');

            if ($customizeBanner == null && $request->banner_image == null){
                return redirect()->back()->with('error', 'Please Select Image first.')->withInput();
            }


            if ($customizeBanner == null){

                $filePath = $this->upload($request, $image);

                customize_banner::create([

                    'ads_id' => $id,
                    'image' => $filePath,
                    'title' => $request->banner_title,
                    'link' => $request->banner_link,

                ]);

            }else{

                if ($image && $customizeBanner->image){
                    @unlink($customizeBanner->image);

                    $filePath = $this->upload($request, $image);

                    customize_banner::where('ads_id', $id)->update([

                        'ads_id' => $id,
                        'image' => $filePath,
                        'title' => $request->banner_title,
                        'link' => $request->banner_link,

                    ]);

                }else{

                    $filePath = $customizeBanner->image;

                    customize_banner::where('ads_id', $id)->update([

                        'ads_id' => $id,
                        'image' => $filePath,
                        'title' => $request->banner_title,
                        'link' => $request->banner_link,

                    ]);


                }


            }

            Ads::where('id', $id)->update([

                'customize_banner' => $request->customize_banner,

            ]);

        }

        Ads::where('id', $id)->update([

            'display_type_id' => $request->customize_banner ? 4 : $request->display_type,
            'admob_id' => $request->admob_id,
            'fb_id' => $request->fb_id,
            'click_between' => $request->click_between,
            'customize_banner' => $request->customize_banner ?: 0,

        ]);


        return redirect()->back()->with('success', 'Ads Update Successful.');
    }

    public function upload($request, $image)
    {
        $filePath = "";
        if (isset($image)) {
            $fileName = $request->banner_title.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $directory = './uploads/banner/';
            $image->move($directory,$fileName);
            $filePath = $directory.$fileName;

            return $filePath;
        }
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

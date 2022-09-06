<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider as ModelsSlider;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $silder_data = Slider::latest() -> get();
        return view('admin.admin-section.slider',[
            'slider' => $silder_data,
            'form_type' => 'create',
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
        $this -> validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'photo' => 'required',
        ]);
        //btn
        $button = [];
        for ($i=0; $i < count($request -> btn_title); $i++) { 
            array_push($button,[
                'btn_title' => $request -> btn_title[$i],
                'btn_link' => $request -> btn_link[$i],
                'btn_type' => $request -> btn_type[$i],
            ]);
        }
        //photo
        if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();
            $image = Image::make($img -> getRealPath());
            $image -> save(storage_path('app/public/sliders/'.$file_name));
        }
        Slider::create([
            'title' => $request -> title,
            'subtitle' => $request -> subtitle,
            'photo' => $file_name,
            'btn' => json_encode($button)
        ]);
        return back() -> with('success','Data Send');
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
        $silder_data = Slider::latest() -> get();
        $slider = Slider::find($id);
        return view('admin.admin-section.slider',[
            'slider' => $silder_data,
            'form_type' => 'edit',
            's_data' => $slider
        ]);
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
        $data = Slider::find($id);
        //btn
        $button = [];
        for ($i=0; $i < count($request -> btn_title); $i++) { 
            array_push($button,[
                'btn_title' => $request -> btn_title[$i],
                'btn_link' => $request -> btn_link[$i],
                'btn_type' => $request -> btn_type[$i],
            ]);
        }
        if ($request -> hasFile('new_photo')) {
            $img = $request -> file('new_photo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();
            $image = Image::make($img -> getRealPath());
            $image -> save(storage_path('app/public/sliders/'.$file_name));
        }else{
            $file_name = $request -> photo;
        }
        $data -> update([
            'title' => $request -> title,
            'subtitle' => $request -> subtitle,
            'photo' => $file_name,
            'btn' => json_encode($button)
        ]);
        return back() -> with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Slider::find($id);
        $data -> delete();
        return back() -> with('success','Data Deleted');
    }
}

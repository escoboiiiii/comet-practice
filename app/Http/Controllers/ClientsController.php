<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::latest()->get();
        return view('admin.admin-section.clients',[
            'form_type' => 'create',
            'data' => $client
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
            'client' => 'required',
            'logo' => 'required',
        ]);
        //photo
        if ($request -> hasFile('logo')) {
            $img = $request -> file('logo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();
            $I = Image::make($img -> getRealPath());
            $I -> save(storage_path('app/public/sliders/'.$file_name));
        }
        Client::create([
            'client' => $request -> client,
            'logo' => $file_name,
        ]);
        return back();
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
        $client = Client::latest()->get();
        $client_data = Client::find($id);
        return view('admin.admin-section.clients',[
            'form_type' => 'edit',
            'data' => $client,
            'client_data' => $client_data
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
        $data = Client::find($id);
        if ($request -> hasFile('new_logo')) {
            $img = $request -> file('new_logo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();
            $I = Image::make($img -> getRealPath());
            $I -> save(storage_path('app/public/sliders/' . $file_name));
        }else{
            $file_name = $request -> old_logo;
        }
        $data -> update([
            'client' => $request -> client,
            'logo' => $file_name,
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
        $data = Client::find($id);
        $data -> delete();
        return back() -> with('success','Data Deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_data = Permission::latest() -> get();
        return view('admin.admin-pages.permission',[
            'per_data' => $per_data,
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
            'name' => 'required',
        ]);
        Permission::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
        ]);
        return back() -> with('success','Data send');
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
        $per_data = Permission::latest() -> get();
        $edit_data = Permission::find($id);
        return view('admin.admin-pages.permission',[
            'per_data' => $per_data,
            'form_type' => 'edit', 
            'edit_data' => $edit_data
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
        $up_data = Permission::find($id);
        $up_data -> update([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
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
        //
    }
}

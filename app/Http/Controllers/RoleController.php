<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_data = Permission::latest() -> get();
        $role_data = Role::latest() -> get();
        return view('admin.admin-pages.role',[
            'form_type' => 'create',
            'per_data' => $per_data,
            'role_data' => $role_data
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
            'permission' => 'required'
        ]);
        Role::create([
             'name' => $request -> name,
             'slug' => Str::slug($request -> name),
             'permission' => json_encode($request -> permission)
        ]);
        return back() -> with('success','Data Saved');
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
        $role_s = Role::find($id);
        $role_data = Role::latest() -> get();
        return view('admin.admin-pages.role',[
            'form_type' => 'edit',
            'per_data' => $per_data,
            'role_data' => $role_data,
            'role_s' => $role_s
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
        $role_up = Role::find($id);
        $role_up -> update([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name),
            'permission' => json_encode($request -> permission)
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
        $delete = Role::find($id);
        $delete -> delete();
        return back() -> with('success','Data Deleted');
    }
}

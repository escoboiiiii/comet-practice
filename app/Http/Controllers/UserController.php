<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Admin;
use App\Notifications\AdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_data = Admin::latest()-> get();
        $role = Role::latest()-> get();
        return view('admin.admin-pages.user',[
            'form_type' => 'create',
            'admin_data' => $admin_data,
            'role_data' => $role
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
            'email' => 'required',
            'role' => 'required'
        ]);
        $c_pass = str_shuffle('dfassfdsadf/+)(-{}zcvb');
        $pass =  substr($c_pass,10,10);
        $data = Admin::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'role_id' => $request -> role,
            'password' => Hash::make($pass),
        ]);
        $data -> notify(new AdminNotification([$data['name'],$pass]));
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
        $admin_data = Admin::latest()-> get();
        $data = Admin::find($id);
        $role = Role::latest()-> get();
        return view('admin.admin-pages.user',[
            'form_type' => 'edit',
            'admin_data' => $admin_data,
            'role_data' => $role,
            'data' => $data,
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
        $user = Admin::find($id);
        $user -> update([
            'name' => $request -> name,
            'email' => $request -> email,
            'role_id' => $request -> role,
        ]);
        return back() -> with('success','Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Admin::find($id);
        $user -> delete();
        return back() -> with('success','Data Deleted');
    }
}

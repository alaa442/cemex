<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;

use Request;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index',compact('admins'));
    }

    public function show($id)
    {
    	$admin = Admin::findOrFail($id);
        return view('admins.show',compact('admin'));
    }

     public function store()
    {
        $admin = new Admin;
        $admin->Admin_Name = Request::get('admin_name');
        $admin->User_name = Request::get('user_name');
        $admin->Password = Request::get('password');

        $admin->save();
        return redirect('/admins');
    }

    public function create()
    {        
    	return view('admins.create');
    }

    public function edit($id)
    { 
        $admin = Admin::find($id);
    	return view('admins.edit',compact('admin'));
    }

    public function update($id)
    {
        $admin = Admin::find($id);
        $admin->Admin_Name = Request::get('admin_name');
        $admin->User_Name = Request::get('user_name');
        $admin->Password = Request::get('password');

        $admin->save();
        return redirect('/admins');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('/admins');
    }

}

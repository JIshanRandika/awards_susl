<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserDetailsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $users = DB::select('select * from users');
        return view('user_edit_view',['users'=>$users]);
    }

    public function show($id) {
        $users = DB::select('select * from users where id = ?',[$id]);
        return view('user_update',['users'=>$users]);
    }

    public function edit(Request $request,$id) {
        $name = $request->input('name');
        $email = $request->input('email');
        $is_permission = $request->input('is_permission');

        DB::update('update users set name = ?,email=?,is_permission=? where id = ?',[$name,$email,$is_permission,$id]);
        return back()->with('success','Updated successfully');
    }
    public function destroy($id) {
        DB::delete('delete from users where id = ?',[$id]);
        return back()->with('success','successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function login()
	{
		
		return view('backend.login');
	}

	public function post_login(Request $request)
	{
		
		if (Auth::attempt($request->only('email','password'),$request->has('remember'))) {
			return redirect()->route('admin.index');
		}else{
			return back();
		}
	}

	public function logout()
	{
		Auth::logout();	
		return redirect()->route('login');
	}
}

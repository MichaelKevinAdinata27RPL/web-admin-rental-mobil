<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Karyawan;

class Login extends Controller
{
    public function index()
    {
    	return view('login');
    }

    public function check(Request $request)
    {
    	$username = $request->username;
    	$password = $request->password;

    	$data = Karyawan::where("username", $username)->where("password", md5($password));
    	if ($data->count() > 0) {
    		Session::put("logged_in", true);
    		Session::put("karyawan", $data->first());
    		return redirect('dashboard');
    	}else{
    		return redirect('login')->with("message", "Username/Password tidak cocok");
    	}
    }

    public function logout()
    {
    	Session::flush();
    	return redirect("/login");
    }
}

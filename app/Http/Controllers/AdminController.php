<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Environment;
use App\Btn_admin;
use Hash;
use App\User;
use Session;
class AdminController extends Controller
{
    //
    public function add(){
        $data = new User;
        $data->email = 'thuclinh@gmail.com';
        $data->name = 'thuc linh';
        $data->password = Hash::make(123456);
        $data->phone = '0961351655';
        $data->save();
    }
    
    public function AuthLoginCheck(){
        $admin_id = Session::get('id');
        if($admin_id){
            return redirect()->route('admin')->send();
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    public function index()
    {
    	return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLoginCheck();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $req){
    	$email = $req->email;
    	$pass = $req->password;
    	echo $email .'<br>';
    	echo $pass . '<br>';
    	$result = array('email' => $email,'password' => $pass);
    	if(Auth::attempt($result)){
    		return redirect()->route('dashboard');
    	}
    	else{
    		return redirect()->back()->with('message', 'email hoac mat khau bi sai');
    	}
    }
    public function logout(){
        $this->AuthLoginCheck();
    	Auth::logout();
    	return redirect()->route('admin');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function adminLogin()
    {
        if(session('login')){
            return view('admin/adminHome');
        }else{
            return view('admin/adminLogin');
        }
    }
    public function login(Request $request)
    {
        $value=0;
        
        $data=DB::table('users')->where('email',$request->email)
        ->where('password',$request->password)
        ->get();
        foreach($data as $item){
            $value=$item->email;
        }
        if(!empty($value)){
            $request->session()->put('login','value');
           return view('admin/adminHome');
        }else{
            return back();
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('login');
        return redirect()->to('adminlog');
    }
}

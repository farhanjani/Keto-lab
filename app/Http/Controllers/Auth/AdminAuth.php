<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    public function admin_login(){
        return view('auth.admin-login');
    }

    // Admin login script
    public function login_processing(Request $req){

        $validator = Validator::make($req->all(), [
            'email' => 'required|email|max:50',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else {
            if(Admin::where('email', $req->input('email'))->exists()){
                if(Auth::guard('admin')->attempt($req->only('email', 'password'))) {
                    $req->session()->regenerate();

                    return response()->json([
                        'status' => 200,
                        'redirect_url' => route('admin.dashboard'),
                        'message' => "You'll be redirected to your dashboard soon."
                    ]);

                }else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Your entered password is incorrect.'
                    ]);
                }

            }else {
                return response()->json([
                    'status' => 404,
                    'message' => 'This email is not registered with us.'
                ]);
            }
        }
    }

    // Admin logout script
    public function logout(Request $req){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            $req->session()->invalidate();
            return redirect()->route('admin.login');
        }
    }

    public function create_user(){
        $data = array();
        $data['email'] = 'mfarhanriaz14@gmail.com';
        $data['password'] = Hash::make(123456789);
        Admin::create($data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class Settings extends Controller
{
    public function index(){
        $settings = Setting::first();
        $data = compact('settings');

        $admin_role = auth()->user()->role;
        if($admin_role == 1){
            return view('admin.settings')->with($data);
        }else {
            return redirect()->route('admin.dashboard');
        }
    }

        // Update Setting
        public function update_setting(Request $req){
            $setting_id = $req->setting_id;
            $validator = Validator::make($req->all(), [
                'api_username' => 'required|max:100',
                'api_password' => 'required|max:256',
                'template' => 'required'
            ]);
    
            if($validator->fails()){
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->messages()
                ]);
            }else {
                $setting = Setting::where('id', $setting_id)->first();
                $setting->api_username = $req->input('api_username');
                $setting->api_password = $req->input('api_password');
                $setting->template = $req->input('template');
                $setting->update();

                Product::where('template', '>', 0)->update(["template" => $req->input('template')]);

    
                return response()->json([
                    'status' => 200,
                    'message' => 'Setting updated successfully.'
                ]);
            }
        }
}

<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;
use Validator;

class SettingController extends Controller
{
    public function settings()
    {
        return view('company.setting');
    }

    public function save(Request $request)
    {
        $uid = authId();
       
        foreach ($request->except(['_token']) as $key => $value) {
            $setting = Setting::where(['key' => $key, 'user_id' => $uid ])->first() ?? new Setting();
            $setting->key = $key;
            $setting->value = is_file($value) ? uploadFile($value, 'uploads/settings', $key) : $value;
            $setting->user_id = $uid;
            $setting->save();
        }
        return back()->with('success', 'Setting has been updated successfully');
    }
}

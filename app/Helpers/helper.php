<?php

use App\Models\Setting;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

function uploadFile($file, $path, $name)
{
    $originalName = $file->getClientOriginalName();
    $ext = $file->getClientOriginalExtension();
    $name =   authId().'-'.$originalName;
    $file->move($path, $name);
    return $path . '/' . $name;
}

function authId()
{
    return auth()->check() ? auth()->id() : null;
}

function userRole($id=null){
    $id = $id ?? authId();
    return User::find($id)->role ?? null;
}

function user($id=null){
    $id = $id ?? authId();
    return User::find($id) ?? null;
}

function settings($key, $id = 'admin')
{
    if($id=='admin') {
        $id = User::where('role',0)->first();
    }
    return Setting::where(['key' => $key, 'user_id' => $id])->first()->value ?? null;
}

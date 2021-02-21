<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BannerController extends Controller
{
    public function apiIndex()
    {
        $banners = Banner::all();
        return response()->json($banners);
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $banner = new Banner();
        $banner->name = $request->input("name");
        $banner->email = $request->input("email");
        $banner->password = Hash::make($request->input('password'));
        $banner->save();
        return response()->json($banner);
    }


    public function apiBanner($id)
    {
        $banner = Banner::find($id);
        return response()->json($banner);
    }

    public function apiUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];
        $request->validate($rules);

        if ($request->input('password')) {
            $rules['password'] = 'confirmed';
        }

        $banner = Banner::find($id);
        $banner->name = $request->input("name");
        $banner->email = $request->input("email");
        if ($request->input('password')) {
            $banner->password = Hash::make($request->input('password'));
        }
        $banner->save();
        return response()->json($banner);
    }

    public function apiDestroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return response()->json(['message' => 'Delete banner successfuly']);
    }
}

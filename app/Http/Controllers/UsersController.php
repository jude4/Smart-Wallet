<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->id);

        return response()->json($user);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->phone_no = $request->phone_number;
        $user->save();

        return response()->json($user);

    }

    public function updateProfile(Request $request) 
    {
        $user = User::find($request->id);

        if ($request->hasFile('profile_pic')) {
            $image = $request->file('profile_pic');
            $name = Str::slug($request->profile_pic).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/profile_pic');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $user->profile_pic = $name;
        }
        
        $user->save();
        return response()->json($user->profile_pic);
        
       
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserPosts(int $id){
        $userPosts = User::where('id', $id)->with('posts')->get();

        return redirect()->route('home', compact('userPosts'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('profile_cover') && $request->file('profile_cover')->isValid()){
            $profileCover = $request->profile_cover;
            $coverExtension = $profileCover->getClientOriginalExtension();
            $coverRenamed = $user->id.'-'.time().'.'.$coverExtension;
            $profileCover->move(public_path('img/profile-covers'), $coverRenamed);
            $user->profile_cover = $coverRenamed;
        }
        if($request->hasFile('profile_image') && $request->file('profile_image')->isValid()){
            $profileImage = $request->profile_image;
            $imageExtension = $profileImage->getClientOriginalExtension();
            $imageRenamed = $user->id.'-'.time().'.'.$imageExtension;
            $profileImage->move(public_path('img/profile-images'), $imageRenamed);
            $user->profile_image = $imageRenamed;
        }
        $user->save();

        return redirect()->route('home');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(Request $request){
        if (!$request->ajax()) {
            return;
        }
        $followedUser = $request->followed_user;
        $follower = $request->follower_id;
        $user = User::find($followedUser);
        $data = '';

        if($request->follow == 'true'){
            $data = 'SEGUINDO';
            $user->followers()->attach($follower);
            return $data;
        }elseif ($request->follow == 'false'){
            $data = 'SEGUIR';
            $user->followers()->detach($follower);
            return $data;
        }

        return $data;
    }
}

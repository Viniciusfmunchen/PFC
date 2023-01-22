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
}

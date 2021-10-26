<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        if (isset($request['profile_avatar'])) {
            $user->updateAvatar($request, $user);
            return redirect()->back()->with('success', 'Avatar update successful!');
        } else {
            $user->updateProfile($request, $user);
            return redirect()->back()->with('success', 'Profile update successful!');
        }
    }
}

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
        if (Auth::id() == $user->id) {
            return view('users.profile', compact('user'));
        } else {
            return 'You can not access this page!';
        }
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

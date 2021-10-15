<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use Carbon\Carbon;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile ()
    {   
        $user = User::find(Auth::id());
        return view('users.profile', compact('user'));
    }

    public function update (UpdateProfileRequest $request)
    {
        $data = $request->all();
        $user = User::find(Auth::id());

        if (isset($data['profile_name'])) {
            $user->name = $data['profile_name'];
        }

        if (isset($data['profile_email'])) {
            $user->email = $data['profile_email'];
        }

        if (isset($data['profile_birthday'])) {
            $user->birthday = $data['profile_birthday'];
        }

        if (isset($data['profile_phone'])) {
            $user->phone_number = $data['profile_phone'];
        }

        if (isset($data['profile_address'])) {
            $user->address = $data['profile_address'];
        }

        if (isset($data['profile_desc'])) {
            $user->about_me = $data['profile_desc'];
        }

        $user->save();
        return redirect()->back()->with('success', 'Update success!');
    }

    public function avatar (UpdateProfileRequest $request)
    {
        $user = User::find(Auth::id());
        $data = $request->all();
        
        if (isset($data['profile_avatar'])) {
            $request->file('profile_avatar')->storeAs('public/avatars', 'avatar_' . $user->username . '.png', 'local');
            $avatar_path = 'storage/avatars/avatar_' . $user->username . '.png';
            $user->avatar = $avatar_path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Update avatar success');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountManagementController extends Controller
{
    public function index()
    {
        $numberOfUsers = User::where('role', config('config.role.student'))->count();
        $users = User::where('role', config('config.role.student'))->paginate(config('config.pagination'));
        return view('management.index', compact('users', 'numberOfUsers'));
    }
}

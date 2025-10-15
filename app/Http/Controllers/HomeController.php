<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        if ($user->role == 'user') {
            return redirect('user/dashboard');
        } else {
            return redirect('admin/dashboard');
        }
    }

    public function switchAccount()
    {
        $user = Auth::user();
        $userInfor = User::where('id', $user->id)->first();
        if ($userInfor->mode == 'Business') {
            $userInfor->mode = 'Professional';
            $userInfor->save();
            return redirect('dashboard');
        } else {
            $userInfor->mode = 'Business';
            $userInfor->save();
            return redirect('dashboard');
        }
    }

    public function userDashboard()
    {
        return view('dashboard');
    }
}

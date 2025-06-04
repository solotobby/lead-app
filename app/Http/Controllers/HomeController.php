<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function dashboard(){
        $user = Auth::user();
        if($user->role == 'user'){
            return redirect('user/dashboard');
        }else{
             return redirect('admin/dashboard');
        }
    }

    public function userDashboard(){
        return view('dashboard');
    }
}

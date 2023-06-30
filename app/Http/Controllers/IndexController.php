<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            //current role
            $userRole = Auth::user()->role;

            if ($userRole == 'admin') {
                return redirect()->route('admin.roles.index');
            } else if ($userRole != 'admin') {
                return redirect()->route('vibhag.YojanaCategory.index');
            } else {
                return redirect('/logout');
            }
        } else {
            return redirect()->route('home');
        }
    }
}

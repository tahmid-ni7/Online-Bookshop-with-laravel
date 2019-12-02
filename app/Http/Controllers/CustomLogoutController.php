<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomLogoutController extends Controller
{
    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/')->with('logout_message', "You logged out successfully.");
    }
}

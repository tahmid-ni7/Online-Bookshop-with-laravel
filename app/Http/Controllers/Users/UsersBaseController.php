<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }

    public function index()
    {
        return view('public.users.profile');
    }

}

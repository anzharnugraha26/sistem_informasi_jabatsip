<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $u = User::all();
        $c = DB::table('users')->count();
        return view('user.index', compact('u', 'c'));
    }
}

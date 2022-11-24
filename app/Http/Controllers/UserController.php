<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $u = User::all();
        $c = DB::table('users')->count();
        return view('user.index', compact('u', 'c'));
    }

    public function tambah()
    {
        $data['flag'] = '0';
        return view('user.form', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'kode_user' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'kode_user' => $request['kode_user'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/user');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}

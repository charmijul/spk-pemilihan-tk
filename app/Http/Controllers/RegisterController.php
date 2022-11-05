<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => ['required','min:5','max:255']
        ]);
        
        //enkripsi password user menggunakan bcrypt
        //$validatedData['password']=bcrypt($validatedData['password']);

        //enkripsi password user menggunakan Hash
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
       //$request->session()->flash('success', 'Registration Successfull!! Please Login');
        return redirect('/login')->with('success', 'Registration Successfull!! Please Login');
    }
}

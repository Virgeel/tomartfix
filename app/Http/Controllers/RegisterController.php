<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function landing(){
        return view('register');
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'nameawal' => 'required',
            'nameakhir' => 'required',
            'email' => 'required|email|unique:users',
            'level'=>'required',
            'password'=> 'required|min:4|max:255'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/login')-> with('success','Registrasi berhasil, akun telah dibuat!');


    }

}

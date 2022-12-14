<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login (Request $request) {
        if($request->method() === 'GET') {
            return view('users.login');
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $pengguna = Pengguna::query()
            ->where('email', $email)
            ->first();
        if($pengguna == null) {
            return redirect()
                ->back()
                ->withErrors([
                    'msg' => 'Email tidak ditemukan!'
                ]);
        }

        if(Hash::check($password, $pengguna->password)) {
            return redirect()
                ->back()
                ->withErrors([
                    'msg' => 'Password salah!'
                ]);
        }

        if(session()->isStarted()) session()->start();

        session()->put('logged', true);
        session()->put('id_pengguna', $pengguna->id);

        return redirect()->route('homepage');

    }

    public function logout() {
        session()->flush();
        return redirect()->route('login');
    }
}

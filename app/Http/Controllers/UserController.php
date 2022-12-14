<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->limit(5)
            ->offset(0)
            ->get();

        return view("users.list", compact('users'));
    }
    public function detail($id)
    {
        $user = User::query()
                    ->where('id', $id)
                    ->first();

        return view("users.detail", compact('user'));
    }
    public function store(Request $request)
    {
        $payload = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ];

        User::create($payload);
        return redirect()->back();
    } // menambahkan data
    public function create()
    {
        return view('users.create');
    } // menampilkan halaman membuat data
    public function update(Request $request, $id = null)
    {
        $user = User::query()->where('id', $id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
        return redirect()->back();
    } // mengupdate data
    public function destroy ($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->back();
    }
}

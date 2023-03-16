<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function admin()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }

    public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('admin')->with('success', 'El usuario ha sido eliminado.');
}
}

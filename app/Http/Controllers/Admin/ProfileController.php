<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = $this->getUser();

        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        $user = $this->getUser();
        $user->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
        ]);

        return back()->with('success', 'Profil tahrirlandi!');
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user = $this->getUser();
        $user->update([
            'password' => bcrypt($request->post('password'))
        ]);

        return back()->with('success', 'Parolingiz o`zgartirildi!');
    }

    private function getUser()
    {
        $id = auth()->user()->id;

        return User::findOrFail($id); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return view("user.index", ['users' => $users]);
    }

    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::USER);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        return view("user.edit", ["user" => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::USER);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect(RouteServiceProvider::USER);
    }
}

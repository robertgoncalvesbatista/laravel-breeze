<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $user = User::all();

        return view("user.index", ['users' => $user]);
    }

    public function create()
    {
        return view("user.create");
    }

    public function store(Request $request, Response $response)
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

        return redirect(RouteServiceProvider::USERS);
    }

    public function edit(Request $request, Response $response, $id)
    {
        $user = User::find($id);

        return view("user.edit", ["user" => $user]);
    }

    public function update(Request $request, Response $response, $id)
    {
        $user = User::where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::USERS);
    }

    public function destroy(Request $request, Response $response, $id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect(RouteServiceProvider::USERS);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Cria uma função
        //$role = Role::create(['name' => 'writer']);

        // Cria uma permissão
        //$permission = Permission::create(['name' => 'create articles']);

        // Pesquisa uma função pelo id
        //$role = Role::findById(1);

        // Pesquisa uma permissão pelo id
        //$permission = Permission::findById(1);

        // Uma função recebe uma permissão
        //$role->givePermissionTo($permission);

        // Uma permissão se liga a uma função
        //$permission->assignRole($role);

        //auth()->user()->givePermissionTo("write posts");
        //auth()->user()->assignRole("writer");

        //return auth()->user()->permissions;

        return view("welcome");
    }
}

<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index()
    {
        // Cria uma função
        // Role::create(['name' => 'writer']);

        // Cria uma permissão
        // Permission::create(['name' => 'edit post']);

        // Pesquisa uma função pelo id
        // $role = Role::findById(1);

        // Pesquisa uma permissão pelo id
        // $permission = Permission::findById(1);

        // Uma função recebe uma permissão
        // $role->givePermissionTo($permission);

        // Uma permissão se liga a uma função
        // $permission->assignRole($role);

        // auth()->user()->givePermissionTo("edit post");
        // auth()->user()->assignRole("writer");

        //return auth()->user()->permissions;

        return view("welcome");
    }
}

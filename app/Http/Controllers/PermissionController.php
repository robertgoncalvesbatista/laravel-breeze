<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::all();

        return view("permission.index", ['permissions' => $permissions]);
    }

    public function create()
    {
        return view("permission.create");
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::PERMISSION);
    }

    public function show(Request $request, $id)
    {
        $roles = Role::all();
        $permission = Permission::find($id);

        return view("permission.show", ['permission' => $permission, 'roles' => $roles]);
    }

    public function edit(Request $request, $id)
    {
        $permission = Permission::find($id);

        return view("permission.edit", ["permission" => $permission]);
    }

    public function update(Request $request, $id)
    {
        Permission::where('id', $id)->update([
            "name" => $request->name,
        ]);

        return redirect(RouteServiceProvider::PERMISSION);
    }

    public function destroy(Request $request, $id)
    {
        $permission = Permission::find($id);

        $permission->delete();

        return redirect(RouteServiceProvider::PERMISSION);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('app.roles.index');
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('app.roles.create');
        $modules = Module::all();
        return view('backend.roles.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('app.roles.create');
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ])->permissions()->sync($request->input('permissions'));
        notify()->success("Role created successfully.");
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('app.roles.edit');
        $modules = Module::all();
        return view('backend.roles.create', compact('role', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('app.roles.edit');
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $role->permissions()->sync($request->input('permissions'));
        notify()->success("Role updated successfully.");
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('app.roles.destroy');
        if($role->deletable){
            $role->delete();
            notify()->success("Role deleted successfully.", "Success");
            return redirect()->route('roles.index');
        } else {
            notify()->error("This role is not deletable.", "Error");
            return redirect()->route('roles.index');
        }
    }
}

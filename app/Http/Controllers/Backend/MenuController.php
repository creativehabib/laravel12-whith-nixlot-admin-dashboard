<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('app.menus.index');
        $menus = Menu::latest('id')->get();
        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('app.menus.create');
        return view('backend.menus.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('app.menus.create');
        $this->validate($request, [
            'name' => 'required|string|unique:menus',
            'description' => 'nullable|string'
        ]);
        Menu::create([
            'name' => Str::slug($request->name),
            'description' => $request->description,
            'deletable' => true
        ]);
        notify()->success("Menu created successfully.");
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        Gate::authorize('app.menus.edit');
        return view('backend.menus.form', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        Gate::authorize('app.menus.edit');
        $this->validate($request, [
            'name' => 'required|string|unique:menus,name,'.$menu->id,
            'description' => 'nullable|string'
        ]);
        $menu->update([
            'name' => Str::slug($request->name),
            'description' => $request->description,
            'deletable' => true
        ]);
        notify()->success("Menu updated successfully.");
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Gate::authorize('app.menus.destroy');
        if($menu->deletable == true){
            $menu->delete();
            notify()->success("Menu deleted successfully.");
        } else{
            notify()->error("Sorry you con\'t delete system menu.");
        }
        return back();
    }
}

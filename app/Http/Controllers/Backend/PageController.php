<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('app.pages.index');
        $pages = Page::latest('id')->get();
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('app.pages.create');
        return view('backend.pages.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('app.pages.create');
        $this->validate($request, [
            'title'     => 'required|string|unique:pages',
            'body'      => 'nullable|string',
            'image'     => 'nullable|image'
        ]);
        (new Page())->storeData($request);
        notify()->success("Page created successfully.");
        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        Gate::authorize('app.pages.edit');
        return view('backend.pages.form', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        Gate::authorize('app.pages.edit');
        $this->validate($request, [
            'title'     => 'required|string|unique:pages,title,'.$page->id,
            'body'      => 'nullable|string',
            'image'     => 'nullable|image'
        ]);
        (new Page())->updateData($request, $page);
        notify()->success("Page updated successfully.");
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        (new Page())->deletePage($page);
        notify()->success("Page deleted successfully.");
        return back();
    }
}

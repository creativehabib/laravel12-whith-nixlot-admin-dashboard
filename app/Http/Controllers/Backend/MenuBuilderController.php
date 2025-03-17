<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menus\StoreMenuItemRequest;
use App\Http\Requests\Menus\UpdateMenuItemRequest;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class MenuBuilderController extends Controller
{
    public function index($id)
    {
        Gate::authorize('app.menus.index');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.builder', compact('menu'));
    }

    public function itemCreate($id)
    {
        Gate::authorize('app.menus.index');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.items.form', compact('menu'));
    }

    /**
     * @param StoreMenuItemRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function itemStore(StoreMenuItemRequest $request, $id): RedirectResponse
    {
        $menu = Menu::findOrFail($id);
        MenuItem::create([
            'menu_id' => $menu->id,
            'type' => $request->type,
            'title' => $request->title,
            'divider_title' => $request->divider_title,
            'url' => $request->url,
            'target' => $request->target,
            'icon_class' => $request->icon_class
        ]);
        notify()->success('Menu Item Successfully Added.', 'Added');
        return redirect()->route('menus.builder',$menu->id);
    }
    /**
     * Edit menu item
     * @param $menuId
     * @param $itemId
     * @return Factory|View
     */
    public function itemEdit($menuId, $itemId)
    {
        Gate::authorize('app.menus.edit');
        $menu = Menu::findOrFail($menuId);
        $menuItem = $menu->menuItems()->findOrFail($itemId);
        return view('backend.menus.items.form',compact('menu','menuItem'));
    }

    /**
     * Update menu item
     * @param UpdateMenuItemRequest $request
     * @param $menuId
     * @param $itemId
     * @return RedirectResponse
     */
    public function itemUpdate(UpdateMenuItemRequest $request, $menuId, $itemId)
    {
        $menu = Menu::findOrFail($menuId);
        $menu->menuItems()->findOrFail($itemId)->update([
            'type' => $request->type,
            'title' => $request->title,
            'divider_title' => $request->divider_title,
            'url' => $request->url,
            'target' => $request->target,
            'icon_class' => $request->icon_class
        ]);
        notify()->success('Menu Item Successfully Updated.', 'Updated');
        return redirect()->route('menus.builder',$menu->id);
    }

    /**
     * Delete a menu item
     * @param $menuId
     * @param $itemId
     * @return RedirectResponse
     */
    public function itemDestroy($menuId, $itemId)
    {
        Gate::authorize('app.menus.destroy');
        Menu::findOrFail($menuId)
            ->menuItems()
            ->findOrFail($itemId)
            ->delete();
        notify()->success('Menu Item Successfully Deleted.', 'Deleted');
        return redirect()->back();
    }
}

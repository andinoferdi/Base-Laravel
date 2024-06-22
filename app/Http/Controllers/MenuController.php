<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('dashboard.menu.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:menus',
        'slug' => 'required|unique:menus',
        'icon' => 'nullable'
    ]);

    Menu::create($request->all());
    return redirect()->route('menu')->with('success', 'Menu created successfully.');
}

    public function edit(Menu $menu)
    {
        return view('dashboard.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
{
    $request->validate([
        'name' => 'required|unique:menus,name,' . $menu->id,
        'slug' => 'required|unique:menus,slug,' . $menu->id,
        'icon' => 'nullable'
    ]);

    $menu->update($request->all());
    return redirect()->route('menu')->with('success', 'Menu updated successfully.');
}

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu')->with('success', 'Menu deleted successfully.');
    }

    public function showDynamicMenu($menu)
{
    $viewPath = "dashboard.{$menu}.index";

    if (view()->exists($viewPath)) {
        return view($viewPath);
    } else {
        abort(404, 'Menu not found.');
    }
}
}

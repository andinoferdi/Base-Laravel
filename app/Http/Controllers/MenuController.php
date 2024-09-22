<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'nama_menu' => 'required|unique:menus',
            'link_menu' => 'required|unique:menus',
            'icon_menu' => 'nullable',
            'create_by' => 'required',
        ]);

        // Create the menu in the database
        $menu = Menu::create($request->all());

        // Now, create the folder structure dynamically
        $menuPath = resource_path("views/dashboard/{$request->link_menu}");

        if (!File::exists($menuPath)) {
            File::makeDirectory($menuPath, 0755, true);

            // Create a basic index.blade.php file inside the folder
            File::put("{$menuPath}/index.blade.php", "@extends('layouts.app')\n@section('content')\n<h1>{$request->nama_menu}</h1>\n@endsection");
        }

        return redirect()->route('menu')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('dashboard.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required|unique:menus,nama_menu,' . $menu->id,
            'link_menu' => 'required|unique:menus,link_menu,' . $menu->id,
            'icon_menu' => 'nullable',
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

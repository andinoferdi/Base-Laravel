<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('urutan_menu', 'asc')->get();
        return view('dashboard.menu.index', compact('menus'));
    }

    public function create()
{
    $nextUrutanMenu = Menu::max('urutan_menu') + 1; // Get the next urutan_menu
    return view('dashboard.menu.create', compact('nextUrutanMenu'));
}

   public function store(Request $request)
{
    $request->validate([
        'nama_menu' => 'required|string|max:255',
        'link_menu' => 'required|string|max:255',
        'icon_menu' => 'nullable|string|max:255',
        'status_menu' => 'required|boolean',
        'urutan_menu' => 'required|integer'
    ]);

    Menu::create($request->all());

    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
}


  public function edit(Menu $menu)
{
    $menus = Menu::all(); // Get all menus
    $nextUrutanMenu = Menu::max('urutan_menu') + 1; // Get the next urutan_menu
    return view('dashboard.menu.edit', compact('menu', 'nextUrutanMenu', 'menus'));
}

public function update(Request $request, Menu $menu)
{
    // Dump and die untuk melihat semua data request yang masuk

    // Validasi
    $request->validate([
        'nama_menu' => 'required|string|max:255',
        'link_menu' => 'required|string|max:255',
        'icon_menu' => 'nullable|string|max:255',
        'status_menu' => 'required|boolean',
        'urutan_menu' => 'required|integer'
    ]);

    // Proses update
    $menu->update($request->all());

    return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
}


    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function showDynamicMenu($link_menu)
    {
        $menu = Menu::where('link_menu', $link_menu)->firstOrFail();
        return view('dashboard.menu.show', compact('menu'));
    }
}

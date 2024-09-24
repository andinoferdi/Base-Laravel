<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SettingMenu;

class CheckMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Get the menu_id from the current route
        $menuId = $this->getMenuIdFromRoute($request);

        if ($menuId) {
            // Check if the user has access to the menu based on menu_id
            $hasAccess = SettingMenu::where('jenis_user_id', $user->jenis_user_id)
                ->where('menu_id', $menuId)
                ->exists();

            // If access is denied, redirect or abort
            if (!$hasAccess) {
                return redirect()->route('dashboard')->with('error', 'You do not have access to this menu.');
            }
        }

        return $next($request);
    }

    private function getMenuIdFromRoute(Request $request)
    {
        // Define your route to menu_id mapping based on MenuSeeder
        $routeMenuMapping = [
            'menu.index' => 1, // Menu
            'setting_menus.index' => 2, // Setting Menu
            'users.index' => 3, // User
            'jenis_user.index' => 4, // Jenis User
            'satuan.index' => 5, // Satuan
            'kecamatan.index' => 6, // Kecamatan
            'kategori_buku.index' => 7, // Kategori Buku
            'buku.index' => 8, // Buku
            'mahasiswa.index' => 9, // Mahasiswa
            'aktivitas.user.index' => 10, // Aktivitas User
            'aktivitas.error_aplikasi.index' => 11, // Error Aplikasi
            'settings.profile.index' => 12, // Profile
        ];

        $routeName = $request->route()->getName();

        return $routeMenuMapping[$routeName] ?? null;
    }
}

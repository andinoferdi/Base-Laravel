<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserActivityController extends Controller
{
    /**
     * Mencatat aktivitas pengguna.
     *
     * @param string $description
     * @param string $status
     * @return void
     */


    public function index()
    {
        $activities = UserActivity::with('user')->get(); // Mengambil semua data aktivitas beserta data user

        return view('dashboard.aktivitas.user', ['activities' => $activities]);
    }
    public function logActivity($description, $status)
    {
        $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login

        UserActivity::create([
            'user_id' => $userId,
            'diskripsi' => $description,
            'status' => $status,
            'stand' => now(), // Menggunakan timestamp saat ini
            'delete_mark' => 'N',
        ]);
    }

    /**
     * Contoh fungsi untuk memanggil logActivity.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function someAction(Request $request)
    {
        // Logika untuk aksi tertentu
        // ...

        // Catat aktivitas pengguna
        $this->logActivity('User melakukan aksi tertentu', 'A');

        return response()->json(['message' => 'Aksi berhasil dicatat.']);
    }

    /**
     * Menampilkan daftar aktivitas pengguna.
     *
     * @return \Illuminate\View\View
     */
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        return view('dashboard.user.index', compact('users', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('dashboard.user.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'nullable|string|max:15',
            'wa' => 'nullable|string|max:15',
            'pin' => 'nullable|string|max:6',
            'password' => 'required|string|min:8',
            'is_admin' => 'required|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('fotos', 'public') : null;

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'wa' => $request->wa,
            'pin' => $request->pin,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
            'foto' => $fotoPath,
        ]);

        $user->create_by = auth()->user() ? auth()->user()->name : 'system';
        $user->create_date = now('Asia/Jakarta');
        $user->status_user = false; // default value for status_user
        $user->save();

        return redirect()->route('user')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'no_hp' => 'nullable|string|max:15',
        'wa' => 'nullable|string|max:15',
        'pin' => 'nullable|string|max:6',
        'password' => 'nullable|string|min:8',
        'is_admin' => 'required|boolean',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->file('foto')) {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $fotoPath = $request->file('foto')->store('fotos', 'public');
    } else {
        $fotoPath = $user->foto;
    }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'wa' => $request->wa,
        'pin' => $request->pin,
        'password' => $request->password ? bcrypt($request->password) : $user->password,
        'is_admin' => $request->is_admin,
        'foto' => $fotoPath,
        'update_by' => auth()->user() ? auth()->user()->name : 'system',
        'update_date' => now('Asia/Jakarta'),
    ]);

    return redirect()->route('user')
        ->with('success', 'User updated successfully.');
}
    public function destroy(User $user)
    {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->delete();
        return redirect()->route('user')
            ->with('success', 'User deleted successfully.');
    }
}

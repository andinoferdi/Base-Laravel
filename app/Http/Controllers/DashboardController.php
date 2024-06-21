<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
   $user = Auth::user();


class DashboardController extends Controller
{
    public function index(Request $request)

    {
        $users = User::all();
     return view('dashboard.index', compact('users'));
}
}

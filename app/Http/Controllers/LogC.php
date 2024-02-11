<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\LogM;

use Illuminate\Http\Request;

class LogC extends Controller
{
    public function index()
    {
        $logM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Log'
        ]);

        $subtitle = "Daftar Aktivitas";
        $logM = LogM::select('users.*', 'log.*')->join('users', 'users.id', '=', 'log.id_user')->orderBy('log.id', 'desc')->paginate(10);
        return view('log', compact('logM', 'subtitle'));
    }
}

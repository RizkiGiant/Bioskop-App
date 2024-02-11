<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitle = "Daftar User";
        $usersM = User::all();
        return view('users_index', compact('usersM', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtitle = "Tambah Data User";
        return view('users_create', compact('subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'role' => 'required',
        ]);

        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subtitle = "Edit Data User";
        $users = User::find($id);
        return view('users_edit', compact('users', 'subtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'role' => 'required',
        ]);
        $users = request()->except(['_token', '_method', 'submit']);

        User::where('id', $id)->update($users);
        return redirect()->route('users.index')->with('success', 'User Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('users.index')->with('success', 'User Berhasil Dihapus');
    }

    public function changepassword($id)
    {
        $subtitle = "Ganti Password";
        $data = User::find($id);
        return view('users_changepassword', compact('data', 'subtitle'));
    }

    public function change(Request $request, $id)
    {
        $request->validate([
            'password_new' => 'required',
            'password_confirm' => 'required|same:password_new',
        ]);
        $users = User::where('id', $id)->first();
        $users->update([
            'password' => Hash::make($request->password_new),
        ]);
        return redirect()->route('users.index')->with('success', 'Kata Sandi Berhasil Diperbaharui!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RuangM;

class RuangC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitle = "Daftar Teater";
        $ruangM = RuangM::all();
        return view('ruang_index', compact('ruangM', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtitle = "Tambah Data";
        return view('ruang_create', compact('subtitle'));
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
            'nama' => 'required',
            'jumlah_kursi' => 'required',
        ]);

        RuangM::create($request->post());
        return redirect()->route('ruang.index')->with('success', 'Ruangan Berhasil Ditambahkan');
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
        $subtitle = "Edit Data Teater";
        $data = RuangM::find($id);
        return view('ruang_edit', compact('data', 'subtitle'));
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
            'nama' => 'required',
            'jumlah_kursi' => 'required',
        ]);
        $data = request()->except(['_token', '_method', 'submit']);

        RuangM::where('id', $id)->update($data);
        return redirect()->route('ruang.index')->with('success', 'Ruangan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        RuangM::where('id', $id)->delete();
        return redirect()->route('ruang.index')->with('success', 'Ruangan Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsM;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;
use PDF;

class ProductsC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Produk'
        ]);

        $subtitle = "Daftar Produk";
        $productsM = ProductsM::all();
        return view('products_index', compact('productsM', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtitle = "Tambah Produk";
        return view('products_create', compact('subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Menambah Produk'
        ]);

        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'durasi' => 'required',
            'harga_produk' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $folderPath = 'asset/images';
                $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($folderPath), $imgName);
                $input['image'] = $imgName;
            } else {
                return redirect()->back()->withErrors(['image' => 'Invalid Image File.'])->withInput();
            }

            ProductsM::create($input);

            return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan');
        }
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
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mengedit Produk'
        ]);

        $subtitle = "Edit Data Produk";
        $data = ProductsM::find($id);
        return view('products_edit', compact('data', 'subtitle'));
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
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mengedit Produk'
        ]);

        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'durasi' => 'required',
            'harga_produk' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = ProductsM::findOrFail($id);
        $input = $request->all();
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $folderPath = 'asset/images';
                $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($folderPath), $imgName);
                $input['image'] = $imgName;
    
                // Delete old image file if it exists
                if ($data->image && file_exists(public_path($folderPath . '/' . $data->image))) {
                    unlink(public_path($folderPath . '/' . $data->image));
                }
            } else {
                return redirect()->back()->withErrors(['image' => 'Invalid Image File.'])->withInput();
            }
        }
    
        $data->update($input);
    
        return redirect()->route('products.index')->with('success', 'Data Products Berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Menghapus Produk'
        ]);

        ProductsM::where('id', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Dihapus');
    }

    public function pdf(){
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mencetak PDF'
        ]);
        
        $ProductsM = ProductsM::all();
        //return view('products_pdf', compact('productsM'));
        $pdf = PDF::loadview('products_pdf', ['productsM' => $ProductsM]);
        return $pdf->stream('products.pdf');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionsM;
use App\Models\ProductsM;
use App\Models\LogM;
use App\Models\RuangM;
use Illuminate\Support\Facades\Auth;
use PDF;

class TransactionsC extends Controller
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
            'activity' => 'User Melihat Halaman Transaksi'
        ]);

        $subtitle = "Daftar Transaksi";

        $transactionsM = TransactionsM::select(
            'products.*',
            'ruang.*',
            'transactions.*',
            'transactions.id AS id_trans',
            'ruang.nama AS nama_ruang',
            'ruang.jumlah_kursi AS kursi'
        )
            ->leftJoin('ruang', 'ruang.id', '=', 'transactions.id_ruang')
            ->leftJoin('products', 'products.id', '=', 'transactions.id_produk')
            ->paginate(10);

        // if ($vcari) {
        //     $transactionsM = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans', 'transactions.created_at AS tg')
        //         ->join('products', 'products.id', '=', 'transactions.id_produk')
        //         ->where(function ($query) use ($vcari) {
        //             $query->where('nama_pelanggan', 'like', '%' . $vcari . '%')
        //                 ->orWhere('nomor_unik', 'like', '%' . $vcari . '%')
        //                 ->orWhere('harga_produk', 'like', '%' . $vcari . '%')
        //                 ->orWhere('nama_produk', 'like', '%' . $vcari . '%')
        //                 ->orWhere('uang_kembali', 'like', '%' . $vcari . '%')
        //                 ->orWhere('uang_bayar', 'like', '%' . $vcari . '%')
        //                 ->orWhere('transactions.created_at', 'like', '%' . $vcari . '%');
        //         })
        //         ->paginate(10);
        // } else {
        //     $transactionsM = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans', 'transactions.created_at AS tg')
        //         ->join('products', 'products.id', '=', 'transactions.id_produk')
        //         ->paginate(10);
        // }

        return view('transactions_index', compact('transactionsM', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subtitle = "Tambah Data Transaksi";
        $productsM = ProductsM::all();
        $ruangM = RuangM::all();
        return view('transactions_create', compact('productsM', 'ruangM', 'subtitle'));
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
            'activity' => 'User Menambah Transaksi'
        ]);

        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'id_ruang' => 'required',
            'uang_bayar' => 'required',
        ]);

        $products = ProductsM::find($request->input('id_produk'));
        $ruang = RuangM::find($request->input('id_ruang'));

        if (!$products) {
            return redirect()->route('transactions.create')->with('error', 'Produk tidak ditemukan');
        }

        $transactions = new TransactionsM;
        $transactions->nomor_unik = $request->input('nomor_unik');
        $transactions->nama_pelanggan = $request->input('nama_pelanggan');
        $transactions->id_produk = $request->input('id_produk');
        $transactions->id_ruang = $request->input('id_ruang');
        $transactions->uang_bayar = $request->input('uang_bayar');
        $transactions->uang_kembali = $request->input('uang_bayar') - $products->harga_produk;
        $transactions->save();
        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Ditambahkan');
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
            'activity' => 'User Melakukan Edit Data Transaksi'
        ]);

        $subtitle = "Edit Data Transaksi";
        $transactions = TransactionsM::find($id);

        if (!$transactions) {
            return redirect()->route('transactions.index')->with('error', 'Transaksi tidak ditemukan');
        }

        $productsM = ProductsM::all();
        return view('transactions_edit', compact('productsM', 'transactions', 'subtitle'));
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
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'uang_bayar' => 'required',
        ]);

        $transactions = TransactionsM::find($id);

        if (!$transactions) {
            return redirect()->route('transactions.index')->with('error', 'Transaksi tidak ditemukan');
        }

        $products = ProductsM::find($request->input('id_produk'));

        if (!$products) {
            return redirect()->route('transactions.edit', $id)->with('error', 'Produk tidak ditemukan');
        }

        $transactions->nomor_unik = $request->input('nomor_unik');
        $transactions->nama_pelanggan = $request->input('nama_pelanggan');
        $transactions->id_produk = $request->input('id_produk');
        $transactions->uang_bayar = $request->input('uang_bayar');
        $transactions->uang_kembali = $request->input('uang_bayar') - $products->harga_produk;
        $transactions->save();
        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Menghapus Data Transaksi'
        ]);

        $transactions = TransactionsM::find($id);

        if (!$transactions) {
            return redirect()->route('transactions.index')->with('error', 'Transaksi tidak ditemukan');
        }

        $transactions->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Dihapus');
    }

    public function pdf($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mencetak PDF'
        ]);

        $transactionsM = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_tran', 'transactions.created_at AS tg')
            ->join('products', 'products.id', '=', 'transactions.id_produk')
            ->where('transactions.id', $id)->get();

        $pdf = PDF::loadview('transactions_pdf', ['transactionsM' => $transactionsM]);
        return $pdf->stream('struk.pdf');
    }

    public function all()
    {
        $subtitle = "tanggal";
        return view('transactions_date', compact('subtitle'));
    }

    public function pertanggal(Request $request)
    {
        // Gunakan tanggal yang diterima sesuai kebutuhan
        $tgl_awal = $request->input('tgl_awal');
        $tgl_akhir = $request->input('tgl_akhir');
        // dd(["tanggal awal: ".$tgl_awal, "tanggal akhir: ".$tgl_akhir]);

        $transactions = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_tran', 'transactions.created_at AS tg')
            ->join('products', 'products.id', '=', 'transactions.id_produk')
            ->whereBetween('transactions.created_at', [$tgl_awal, $tgl_akhir])
            ->get();

        $pdf = PDF::loadview('transactions_tgl', ['transactions' => $transactions]);
        return $pdf->stream('stgl.pdf');
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsC;
use App\Http\Controllers\TransactionsC;
use App\Http\Controllers\UsersC;
use App\Http\Controllers\LoginC;
use App\Http\Controllers\LogC;
use App\Http\Controllers\RuangC;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $subtitle = "Home Page";
    return view('dashboard', compact('subtitle'));
})->middleware('auth');

Route::resource('products', ProductsC::class);

// PDF
Route::get('/struk/{id}', [TransactionsC::class, 'pdf'])->name('transactions.pdf'); //PDF STRUK TRANSACTIONS
Route::get('/transactions/all', [TransactionsC::class, 'all'])->name('transactions.all'); //MENAMPILKAN PILIHAN TAGGAL PDF TRANSACTIONS
Route::get('/pertanggal/{tgl_awal}/{tgl_akhir}', [TransactionsC::class, 'pertanggal'])->name('transactions.pertanggal');; //PDF PERTANGGAL

// Transaksi
Route::get('transactions', [TransactionsC::class, 'index'])->name('transactions.index');
Route::get('transactions/create', [TransactionsC::class, 'create'])->name('transactions.create');
Route::post('transactions/create', [TransactionsC::class, 'store'])->name('transactions.store');
Route::get('transactions/edit/{id}', [TransactionsC::class, 'edit'])->name('transactions.edit');
Route::put('transactions/update/{id}', [TransactionsC::class, 'update'])->name('transactions.update');
Route::delete('transactions/delete/{id}', [TransactionsC::class, 'delete'])->name('transactions.delete');

// Users
Route::resource('users', UsersC::class);
Route::get('users/changepassword/{id}', [UsersC::class, 'changepassword'])->name('users.changepassword');
Route::put('users/change/{id}', [UsersC::class, 'change'])->name('users.change');
Route::get('users/edit/{id}', [UsersC::class, 'edit'])->name('users.edit');
Route::delete('users/delete/{id}', [UsersC::class, 'delete'])->name('users.delete');

// Ruangan
Route::get('ruang', [RuangC::class, 'index'])->name('ruang.index');
Route::get('ruang/create', [RuangC::class, 'create'])->name('ruang.create');
Route::post('ruang/create', [RuangC::class, 'store'])->name('ruang.store');
Route::get('ruang/edit/{id}', [RuangC::class, 'edit'])->name('ruang.edit');
Route::put('ruang/update/{id}', [RuangC::class, 'update'])->name('ruang.update');
Route::delete('ruang/delete/{id}', [RuangC::class, 'delete'])->name('ruang.delete');



// Login
Route::get('login', [LoginC::class, 'login'])->name('login');
Route::post('login', [LoginC::class, 'login_action'])->name('login.action');
Route::get('logout', [LoginC::class, 'logout'])->name('logout');

// Log
Route::get('log', [LogC::class, 'index'])->name('log.index');
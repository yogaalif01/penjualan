<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\BarangComponent;
use App\Http\Livewire\transaksi;
use App\Http\Livewire\Testing;
use App\Http\Livewire\Laporan;
use App\Http\Livewire\Login;
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

Route::get('/',Login::class);
Route::get('/logout',function() {
    return redirect('/');
});
Route::get('/admin/dashboard',DashboardComponent::class);
Route::get('/admin/barang',BarangComponent::class);
Route::get('/admin/transaksi',transaksi::class);
Route::get('/admin/laporan',Laporan::class);
Route::get('/testing',Testing::class);
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class Laporan extends Component
{
    public $idbarang,$value,$test;

    public function render()
    {
   
        $barang = DB::table("barang")->get();
        $transaksi = DB::table("transaksi")
                ->join("barang","transaksi.Idbarang","=","barang.Id")    
                ->select("barang.nama_barang","barang.stok","transaksi.*")
                ->where("transaksi.Idbarang",$this->value)
                ->get();      
        return view('livewire.laporan',["barang" => $barang,
            "transaksi" => $transaksi])->extends('livewire.layouts.template');
    }

    public function tampildata()
    {
       
        $barang = DB::table("barang")->where("Id",$this->idbarang)->first();
        $this->value = $barang->Id;
    }
}

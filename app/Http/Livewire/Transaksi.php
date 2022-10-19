<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class Transaksi extends Component
{
    public $nota = "";
    public $tanggal,$Idbarang,$type,$harga,$jumlah;
   
    public function storetransaksi()
    {
        
        $harga = preg_replace('/\D/', '', $this->harga);
        $this->validate([
            "tanggal" => "required",
            "Idbarang" => "required",
            "type" => "required",
            "harga" => "required",
            "jumlah" => "required",
        ]);
        DB::table("transaksi")->insert([
            "nota" => $this->nota,
            "tanggal" => $this->tanggal,
            "Idbarang" => $this->Idbarang,
            "type" => $this->type,
            "harga" => $harga,
            "jumlah" => $this->jumlah,
        ]);

        $barang = DB::table("barang")->where("Id",$this->Idbarang)->first();

        if ($this->type == "pengurangan") {
            DB::table('barang')->where("Id",$this->Idbarang)->update([
                "stok" => $barang->stok - $this->jumlah
            ]);
        }
        else {
            DB::table('barang')->where("Id",$this->Idbarang)->update([
                "stok" => $barang->stok + $this->jumlah
            ]);
        }
        //melakukan pengurangan stok
       

        session()->flash("sukses","Data berhasil Disimpan");
        $this->tanggal = "";
        $this->Idbarang = "";
        $this->type = "";
        $this->harga = "";
        $this->jumlah = "";


        //tutup modal
        $this->dispatchBrowserEvent('close-modal');
    }
   

    public function render()
    {
        $max = DB::table("transaksi")->max('Id');
     
        //membuat nomer otomatis
        if ($max == null ) {
            $this->nota = "NOTA-1";
        }
        else {
            $this->nota = "NOTA-".($max + 1);
        }
        $barang = DB::table('barang')->get();
        $transaksi = DB::table('transaksi')
                    ->join("barang","transaksi.Idbarang","=","barang.Id")
                    ->select("barang.nama_barang","transaksi.*")->get();

        return view('livewire.transaksi',
        ["nota" => $this->nota,
        "barang" => $barang,
        "transaksi" => $transaksi
        ]
        )->extends('livewire.layouts.template');
    }
}

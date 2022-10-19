<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;
use DB;

class BarangComponent extends Component
{
    public $nama_barang,$harga,$stok,$barang_id,$barang_id_hapus;
    public $count = 0;

    //validasi inputan
    public function validasi($fields)
    {
        $this->validateOnly($fields,[
            "nama_barang" => "required",
            "stok" => "required",
            "harga" => "required",
        ]);
    }
    public function testing()
    {
        $this->count++;
    }

    public function storebarangData()
    {
        $harga = preg_replace('/\D/', '', $this->harga);
     
        $this->validate([
            "nama_barang" => "required",
            "stok" => "required",
            "harga" => "required",
        ]);

        DB::table("barang")->insert([
            "nama_barang" => $this->nama_barang,
            "harga" => $harga,
            "stok" => $this->stok,
        ]);

        session()->flash("sukses","Data berhasil Disimpan");
        $this->nama_barang = "";
        $this->harga = "";
        $this->stok = "";


        //tutup modal
        $this->dispatchBrowserEvent('close-modal');
    }
    

    public function editBarangData($id)
    {
        $barang = DB::table("barang")->where("Id",$id)->first();

        $this->nama_barang = $barang->nama_barang;
        $this->harga = $barang->harga;
        $this->stok = $barang->stok;
        $this->barang_id = $barang->Id;

        $this->dispatchBrowserEvent('show-edit-barang-modal');
    }
    public function deleteKonfirmasi($id)
    {
       
        $this->barang_id_hapus = $id;
        $this->dispatchBrowserEvent('show-hapus-barang-modal');
    }
    public function deleteBarangdata()
    {
        DB::table('barang')->where("Id",$this->barang_id_hapus)->delete();
        session()->flash("sukses","Data berhasil Dihapus");
        $this->dispatchBrowserEvent('close-modal');
        $this->barang_id_hapus = "";
    }
    public function updateBarangData()
    {
        $this->validate([
            "nama_barang" => "required",
            "stok" => "required",
            "harga" => "required",
        ]);
     
        DB::table('barang')->where("Id",$this->barang_id)->update([
            "nama_barang" => $this->nama_barang,
            "harga" => $this->harga,
            "stok" => $this->stok,
        ]);
        session()->flash("sukses","Data berhasil Disimpan");
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $barang = DB::table('barang')->get();
        return view('livewire.barang-component', ['barang' => $barang])->extends('livewire.layouts.template');
    }
}

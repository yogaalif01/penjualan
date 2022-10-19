<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;

class Login extends Component
{
    public $username,$password;

    public function render()
    {
        return view('livewire.login')->extends('livewire.layouts.app');
    }
    public function post()
    {
        $this->validate([
            "username" => "required",
            "password" => "required",
        ]);

        $cek = DB::table('user')->where("username",$this->username)->where("password",$this->password)->first();

        if ($cek == null) {
            session()->flash("sukses","Login Gagal Periksa Sandi Terlebih Dahulu");
        }
        else {
         
            return redirect('/admin/dashboard');
        }
    }
}

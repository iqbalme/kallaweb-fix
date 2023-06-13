<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class RegistrasiUlang extends Component
{
    public $registrasi_ulang_img = null;
    public $registrasi_ulang_link = null;

    public function render()
    {
        $registrasi_ulang = Setting::whereIn('nama_setting', ['registrasi_ulang', 'registrasi_ulang_link']);
        if(isset($registrasi_ulang->get()[0]->isi_setting)){
            $this->registrasi_ulang_img = $registrasi_ulang->get()[0]->isi_setting;
        }

        if(isset($registrasi_ulang->get()[1]->isi_setting)){
            $this->registrasi_ulang_link = $registrasi_ulang->get()[1]->isi_setting;
        }

        return view('livewire.frontend.registrasi-ulang')
			->extends('layouts.app', ['title' => 'Registrasi Ulang'])
			->section('content');
    }
}

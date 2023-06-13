<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class AdmisiNonAktif extends Component
{
	public $data;
	
    public function render()
    {
		$settings = Setting::whereIn('nama_setting', ['pesan_admisi_non_aktif','registrasi_tutup_picture'])->get();
		$this->data['teks_admisi'] = $settings[0]['isi_setting'];
		$this->data['gambar_admisi'] = $settings[1]['isi_setting'];
        return view('livewire.frontend.admisi-non-aktif')
			->extends('layouts.app', ['title' => 'Admisi'])
			->section('content');
    }
}

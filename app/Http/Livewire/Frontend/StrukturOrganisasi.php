<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Setting;

class StrukturOrganisasi extends Component
{
    public $initial_data_req = null;
    public $gambar_struktur = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }

    public function render()
    {
        if($this->initial_data_req['is_main_domain']){
            //$this->gambar_struktur = 'frontend/assets/images/struktur-organisasi-ki.png';
            $this->gambar_struktur = Setting::where('nama_setting', 'struktur_organisasi')->first()->isi_setting;
        } else {
            $prodi = Prodi::find($this->initial_data_req['subdomain']['id']);
            $this->gambar_struktur = $prodi->struktur;
        }
        return view('livewire.frontend.struktur-organisasi')
			->extends('layouts.app', ['title' => 'Struktur Organisasi'])
			->section('content');
    }
}

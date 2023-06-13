<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Http\Request;

class TentangKampus extends Component
{
    public $initial_data_req = null;
    public $gambar_tentang_prodi = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }

    public function render()
    {
        $page_title = 'Tentang Kampus';
        if(!$this->initial_data_req['is_main_domain']){
            $page_title = 'Tentang Prodi '.$this->initial_data_req['subdomain']['nama_prodi'];
            $this->gambar_tentang_prodi = 'storage/images/'.$this->initial_data_req['subdomain']['visi_misi'];
        }
        return view('livewire.frontend.tentang-kampus')
			->extends('layouts.app', ['title' => $page_title])
			->section('content');
    }
}

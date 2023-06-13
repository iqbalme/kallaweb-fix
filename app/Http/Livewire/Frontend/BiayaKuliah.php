<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class BiayaKuliah extends Component
{
    public $biaya_kuliah_img = null;

    public function render()
    {
        $biaya_kuliah = Setting::where('nama_setting', 'biaya_kuliah');
        if($biaya_kuliah->count()){
            $this->biaya_kuliah_img = $biaya_kuliah->first()->isi_setting;
        }

        return view('livewire.frontend.biaya-kuliah')
			->extends('layouts.app', ['title' => 'Biaya Kuliah'])
			->section('content');
    }
}

<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class InfoBeasiswa extends Component
{
    public $info_beasiswa_img = null;

    public function render()
    {
        $info_beasiswa = Setting::where('nama_setting', 'info_beasiswa');
        if($info_beasiswa->count()){
            $this->info_beasiswa_img = $info_beasiswa->first()->isi_setting;
        }

        return view('livewire.frontend.info-beasiswa')
			->extends('layouts.app', ['title' => 'Informasi Beasiswa'])
			->section('content');
    }
}

<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class RegistrasiBerhasil extends Component
{
	public function mount(){
		$key = request()->headers->get('Key');
		//dd($key);
	}
    public function render()
    {
        return view('livewire.page.registrasi-berhasil')
			->extends('layouts.app', ['title' => 'Registrasi Sukses'])
			->section('content');
    }
}

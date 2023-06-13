<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Teslw extends Component
{
    public function render()
    {
        return view('livewire.teslw')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'tes']);
			// ->extends('layouts.app', ['title' => 'testing'])
			// ->section('content');
    }
	
	public function tutup(){
		$this->dispatchBrowserEvent('postUpdated');
	}
}

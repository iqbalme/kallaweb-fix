<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\FasilitasModel;

class Fasilitas extends Component
{
	public $data;
	
    public function render()
    {
		$this->data['fasilitas'] = FasilitasModel::orderByDesc('created_at')->get();
        return view('livewire.frontend.fasilitas')
			->extends('layouts.app', ['title' => 'Fasilitas'])
			->section('content');
    }
}

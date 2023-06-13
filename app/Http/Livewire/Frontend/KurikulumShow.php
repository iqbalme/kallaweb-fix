<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Kurikulum;

class KurikulumShow extends Component
{
	public $data;
	
    public function render()
    {
		$this->data['kurikulum'] = Kurikulum::all();
        return view('livewire.frontend.kurikulum-show')
			->extends('layouts.app', ['title' => 'Kurikulum'])
			->section('content');
    }
}

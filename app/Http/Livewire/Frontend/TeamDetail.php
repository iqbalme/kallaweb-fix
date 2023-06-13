<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Team;

class TeamDetail extends Component
{
	public $data;
	
	public function mount($team_id){
		$this->data = Team::find($team_id);
	}
	
    public function render()
    {
        return view('livewire.frontend.team-detail')
			->extends('layouts.app', ['title' => 'Detail Tim Pengajar'])
			->section('content');
    }
}

<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Team;
use App\Models\TimProdi;
use Illuminate\Http\Request;

class TeamList extends Component
{
	public $teams;
	public $initial_data_req = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }

	public function render()
    {
        if($this->initial_data_req['is_main_domain']){
            $this->teams = Team::all();
        } else {
            $ids_team = [];
            $team_ids = TimProdi::where('prodi_id', $this->initial_data_req['subdomain']['id'])->get();
            foreach($team_ids as $ids){
                $ids_team[] = $ids->team_id;
            }
            $this->teams = Team::whereIn('id', $ids_team)->get();
        }

        return view('livewire.frontend.team-list')
			->extends('layouts.app', ['title' => 'List Tim'])
			->section('content');
    }
}

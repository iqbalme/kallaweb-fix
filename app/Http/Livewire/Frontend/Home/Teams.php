<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Team;

class Teams extends Component
{
	public $data;
	
    public function render()
    {
		$this->data['teams'] = Team::all();
		//dd($this->data);
        return view('livewire.frontend.home.teams');
    }
}

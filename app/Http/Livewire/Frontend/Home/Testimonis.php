<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Testimoni;

class Testimonis extends Component
{
	public $data;
	
	public function mount(){
		$testimonis = Testimoni::orderByDesc('created_at')->limit(3)->get();
		$this->data['testimonis'] = $testimonis;
		//dd($testimonis);
	}
	
    public function render()
    {
        return view('livewire.frontend.home.testimonis');
    }
}

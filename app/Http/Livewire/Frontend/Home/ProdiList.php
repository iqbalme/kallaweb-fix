<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Prodi;

class ProdiList extends Component
{
	public $data;
	
    public function render()
    {	
		$this->data['prodis'] = Prodi::all();
        return view('livewire.frontend.home.prodi-list');
    }
}

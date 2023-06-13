<?php

namespace App\Http\Livewire\Katalog;

use Livewire\Component;
use App\Models\Katalog;

class KatalogCreate extends Component
{
	public $allow_in_cart = false;
	public $katalog_id = null;
	public $nama_katalog;
	public $deskripsi_katalog;
	public $harga;
	
    public function render()
    {
        return view('livewire.katalog.katalog-create');
    }
	
	public function create(){
		$katalog = Katalog::create([
			'nama_katalog' => $this->nama_katalog,
			'deskripsi_katalog' => $this->deskripsi_katalog,
			'harga' => $this->harga,
			'allow_in_cart' => ($this->allow_in_cart) ? 1 : 0
		]);
		$this->resetInput();
		$this->emit('refreshKatalog', $katalog);
		return redirect()->route('katalog.index');
	}
	
	public function resetInput(){
		$this->allow_in_cart = false;
		$this->katalog_id = null;
		$this->nama_katalog = null;
		$this->deskripsi_katalog = null;
		$this->harga = null;
	}
	
	public function batalkanKatalog(){
		$this->emit('batalkanKatalog');
	}
}

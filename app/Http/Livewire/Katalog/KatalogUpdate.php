<?php

namespace App\Http\Livewire\Katalog;

use Livewire\Component;
use App\Models\Katalog;

class KatalogUpdate extends Component
{
	public $allow_in_cart = false;
	public $katalog_id = null;
	public $nama_katalog;
	public $deskripsi_katalog;
	public $harga;
	
	protected $listeners = [
		'getKatalog'
	];
	
    public function render()
    {
        return view('livewire.katalog.katalog-update');
    }
	
	public function getKatalog($katalog){
		$this->nama_katalog = $katalog['nama_katalog'];
		$this->katalog_id = $katalog['id'];
		$this->deskripsi_katalog = $katalog['deskripsi_katalog'];
		$this->harga = $katalog['harga'];
		$this->allow_in_cart = $katalog['allow_in_cart'];
	}
	
	public function update(){
		if($this->katalog_id){
			$katalog = Katalog::find($this->katalog_id);
			$katalog->update([
				'nama_katalog' => $this->nama_katalog,
				'deskripsi_katalog' => $this->deskripsi_katalog,
				'harga' => $this->harga,
				'allow_in_cart' => ($this->allow_in_cart) ? 1 : 0
			]);
		}
		$this->resetInput();
		$this->emit('refreshKatalog', $katalog);
	}
	
	public function resetInput(){
		$this->allow_in_cart = false;
		$this->katalog_id = null;
		$this->nama_katalog = null;
		$this->deskripsi_katalog = null;
		$this->harga = null;
	}
}

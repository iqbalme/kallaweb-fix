<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;

class ProdiIndex extends Component
{
	public $data;
	public $isUpdate = false;
	public $isFormVisible = false;
	public $prodi_id = null;

	protected $listeners = [
		'refreshProdi'
	];

    public function render()
    {
		$this->data = Prodi::all();
        return view('livewire.prodi.prodi-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Program Studi']);
    }

	public function setProdiId($id){
		$this->prodi_id = $id;
	}

	public function hapusProdi($id){
		Prodi::find($id)->delete();
	}

	public function getProdi($id){
		$this->isUpdate = true; //jika ini edit, bukan tambah
		$this->isFormVisible = true;
		$prodi = Prodi::find($id);
		$this->emit('getProdi', $prodi);
	}

	public function tambahProdi(){
		$this->isFormVisible = true;
	}

	public function refreshProdi(){
		$this->isUpdate = false;
		$this->isFormVisible = false;
	}
}

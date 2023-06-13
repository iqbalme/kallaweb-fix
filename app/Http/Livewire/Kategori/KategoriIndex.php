<?php

namespace App\Http\Livewire\Kategori;

use Livewire\Component;
use App\Models\Category;

class KategoriIndex extends Component
{
	public $data;
	public $isUpdate = false;
	public $isFormVisible = false;
	public $category_id = null;

	protected $listeners = [
		'refreshKategori'
	];

    public function render()
    {
		$this->data = Category::all();
        return view('livewire.kategori.kategori-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Kategori']);
    }

	public function setKategorId($id){
		$this->category_id = $id;
	}

	public function hapusKategori($id){
		Category::find($id)->delete();
	}

	public function getKategori($id){
		$this->isUpdate = true; //jika ini edit, bukan tambah
		$this->isFormVisible = true;
		$Kategori = Category::find($id);
		$this->emit('getKategori', $Kategori);
	}

	public function tambahKategori(){
		$this->isFormVisible = true;
	}

	public function refreshKategori(){
		$this->isFormVisible = false;
		$this->isUpdate = false;
	}

}

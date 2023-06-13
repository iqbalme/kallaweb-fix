<?php

namespace App\Http\Livewire\Kategori;

use Livewire\Component;
use App\Models\Category;

class KategoriUpdate extends Component
{
	public $nama_kategori;
	public $deskripsi_kategori;
	public $category_id;

    protected $rules = [
        'nama_kategori' => 'required',
        'category_id' => 'required',
    ];

	protected $listeners = [
		'getKategori' => 'showCategory'
	];

    public function render()
    {
        return view('livewire.kategori.kategori-update');
    }

	public function showCategory($kategori){
		$this->nama_kategori = $kategori['nama_kategori'];
		$this->category_id = $kategori['id'];
		$this->deskripsi_kategori = $kategori['deskripsi_kategori'];
	}

	public function update(){
        $this->validate();
		if($this->category_id){
			$kategori = Category::find($this->category_id);
			$kategori->update([
				'nama_kategori' => $this->nama_kategori,
				'deskripsi_kategori' => $this->deskripsi_kategori
			]);
		}
		$this->resetInput();
		$this->emit('refreshKategori', $kategori);
	}

	public function resetInput(){
		$this->category_id = null;
		$this->nama_kategori = null;
		$this->deskripsi_kategori = null;
	}
}

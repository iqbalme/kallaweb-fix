<?php

namespace App\Http\Livewire\Kategori;

use Livewire\Component;
use App\Models\Category;
use App\Http\Traits\CommonTrait;

class KategoriCreate extends Component
{
	use CommonTrait;

	public $nama_kategori;
	public $deskripsi_kategori;
	public $slug;

    protected $rules = [
        'nama_kategori' => 'required'
    ];

    public function render()
    {
        return view('livewire.kategori.kategori-create');
    }

	public function create(){
        $this->validate();
		$kategori = Category::create([
			'nama_kategori' => $this->nama_kategori,
			'deskripsi_kategori' => $this->deskripsi_kategori,
			'slug' => $this->setSlug($this->nama_kategori)
		]);
		$this->resetInput();
		$this->emit('refreshKategori', $kategori);
	}

	public function resetInput(){
		$this->nama_kategori = null;
		$this->deskripsi_kategori = null;
	}
}

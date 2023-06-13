<?php

namespace App\Http\Livewire\Testimoni;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithFileUploads;
use App\Models\Testimoni;

class TestimoniCreate extends Component
{
	use WithFileUploads;

	public $nama = null;
	public $deskripsi = null;
	public $keterangan = null;
	public $gambar = null;

    protected $rules = [
        'nama' => 'required',
        'deskripsi' => 'required',
        'keterangan' => 'required',
        'gambar' => 'required'
    ];

    public function render()
    {
        return view('livewire.testimoni.testimoni-create');
    }

	public function hapusGambar(){
		$this->gambar->delete();
		$this->gambar = null;
	}

	public function simpan(){
        $this->validate();
		$gambar = null;
		if(isset($this->gambar)){
			$gambar = $this->gambar->getFilename();
			$this->gambar->storeAs('public/images', $gambar);
			$this->gambar = null;
		}
		$data = [
			'nama' => $this->nama,
			'deskripsi' => $this->deskripsi,
			'gambar' => $gambar,
			'keterangan' => $this->keterangan
		];
		Testimoni::create($data);
		$this->emitUp('refreshTestimoni');
		$this->reset();
		$this->closeModal();
	}

	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalTestimoni');
	}
}

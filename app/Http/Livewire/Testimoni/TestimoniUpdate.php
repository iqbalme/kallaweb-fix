<?php

namespace App\Http\Livewire\Testimoni;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithFileUploads;
use App\Models\Testimoni;

class TestimoniUpdate extends Component
{
	use WithFileUploads;

	public $testimoni_id = null;
	public $nama = null;
	public $deskripsi = null;
	public $keterangan = null;
	public $gambar = null;
	public $initGambar = true;

	protected $listeners = [
		'getTestimoni'
	];

    protected $rules = [
        'testimoni_id' => 'required',
        'nama' => 'required',
        'deskripsi' => 'required',
        'keterangan' => 'required',
        'gambar' => 'required'
    ];

    public function render()
    {
        return view('livewire.testimoni.testimoni-update');
    }

	public function hapusGambar(){
		if(!$this->initGambar){
			$this->gambar->delete();
		}
		$this->initGambar = false;
		$this->gambar = null;
	}

	public function getTestimoni($testimoni){
		$this->testimoni_id = $testimoni['id'];
		$this->nama = $testimoni['nama'];
		$this->deskripsi = $testimoni['deskripsi'];
		$this->keterangan = $testimoni['keterangan'];
		$this->gambar = $testimoni['gambar'];
		if(isset($testimoni['gambar'])){
			$this->initGambar = true;
		}
	}

	public function simpan(){
        $this->validate();
		$gambar = null;
		if(isset($this->gambar)){
			if(!$this->initGambar){
				$gambar = $this->gambar->getFilename();
				$this->gambar->storeAs('public/images', $gambar);
				$this->gambar = null;
			} else {
				$gambar = $this->gambar;
			}
		}
		$data = [
			'nama' => $this->nama,
			'deskripsi' => $this->deskripsi,
			'gambar' => $gambar,
			'keterangan' => $this->keterangan
		];
		$testimoni = Testimoni::find($this->testimoni_id);
		$testimoni->update($data);
		$this->emitUp('refreshTestimoni');
		$this->reset();
		$this->closeModal();
	}

	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalTestimoniUpdate');
	}
}

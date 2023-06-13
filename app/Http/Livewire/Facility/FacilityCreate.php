<?php

namespace App\Http\Livewire\Facility;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\FasilitasModel;

class FacilityCreate extends Component
{
	use WithFileUploads;

	public $gambar = null;
	public $judul = null;

    protected $rules = [
        'gambar' => 'required'
    ];

    public function render()
    {
        return view('livewire.facility.facility-create');
    }

	public function hapusGambar(){
		$this->gambar->delete();
		$this->gambar = null;
	}

	public function simpan(){
        $this->validate();
		$gambar = '';
		if(isset($this->gambar)){
			$gambar = $this->gambar->getFilename();
			$this->gambar->storeAs('public/images', $gambar);
			$this->gambar = null;
		}
		$data = [
			'judul' => $this->judul,
			'gambar' => $gambar
		];
		FasilitasModel::create($data);
		$this->emit('refreshGaleri');
		$this->reset();
		$this->closeFormGaleri();
	}

	public function closeFormGaleri(){
		$this->reset();
		$this->dispatchBrowserEvent('closeModalGaleri');
	}

}

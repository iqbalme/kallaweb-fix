<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use App\Http\Traits\CommonTrait;
use Livewire\WithFileUploads;

class ProdiCreate extends Component
{
	use CommonTrait;
	use WithFileUploads;

	public $nama_prodi = null;
	public $deskripsi_prodi = null;
	public $slug = null;
	public $thumbnail = null;
	public $subdomain = null;
    public $visi_misi = null;
    public $logo_prodi = null;
    public $struktur = null;

    protected $rules = [
        'nama_prodi' => 'required',
        'thumbnail' => 'required',
        'subdomain' => 'required|unique:prodis,subdomain'
    ];

    public function render()
    {
        return view('livewire.prodi.prodi-create');
    }

	public function create(){
        $this->validate();
		$thumbnail = null;
        $visi_misi = null;
        $logo_prodi = null;
        $struktur = null;
		if(isset($this->thumbnail)){
			$thumbnail = $this->thumbnail->getFilename();
			$this->thumbnail->storeAs('public/images', $thumbnail);
		}
        if(isset($this->visi_misi)){
			$visi_misi = $this->visi_misi->getFilename();
			$this->visi_misi->storeAs('public/images', $visi_misi);
		}
        if(isset($this->logo_prodi)){
			$logo_prodi = $this->logo_prodi->getFilename();
			$this->logo_prodi->storeAs('public/images', $logo_prodi);
		}
        if(isset($this->struktur)){
			$struktur = $this->struktur->getFilename();
			$this->struktur->storeAs('public/images', $struktur);
		}
		$prodi = Prodi::create([
			'nama_prodi' => $this->nama_prodi,
			'deskripsi_prodi' => $this->deskripsi_prodi,
			'slug' => $this->setSlug($this->nama_prodi),
			'thumbnail' => $thumbnail,
			'subdomain' => $this->subdomain,
            'visi_misi' => $visi_misi,
            'logo_prodi' => $logo_prodi,
            'struktur' => $struktur
		]);
		$this->reset();
		$this->emit('refreshProdi', $prodi);
		$this->removeThumbnail();
	}

	public function removeThumbnail(){
		$this->thumbnail->delete();
		$this->thumbnail = null;
	}

    public function removeVisimisi(){
		$this->visi_misi->delete();
		$this->visi_misi = null;
	}

    public function removeLogoprodi(){
		$this->logo_prodi->delete();
		$this->logo_prodi = null;
	}

    public function removeStruktur(){
		$this->struktur->delete();
		$this->struktur = null;
	}
}

<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use Livewire\WithFileUploads;

class ProdiUpdate extends Component
{
	use WithFileUploads;

	public $nama_prodi = null;
	public $deskripsi_prodi = null;
	public $prodi_id = null;
	public $thumbnail = null;
	public $first_thumbnail = false;
	public $subdomain = null;
    public $first_visimisi = null;
    public $visi_misi = null;
    public $first_logoprodi = null;
    public $logo_prodi = null;
    public $first_struktur = null;
    public $struktur = null;

    protected $rules = [
        'nama_prodi' => 'required',
        'thumbnail' => 'required',
        'subdomain' => 'required'
    ];

	protected $listeners = [
		'getProdi' => 'showProdi'
	];

    public function render()
    {
        return view('livewire.prodi.prodi-update');
    }

	public function showProdi($prodi){
		$this->nama_prodi = $prodi['nama_prodi'];
		$this->prodi_id = $prodi['id'];
		$this->deskripsi_prodi = $prodi['deskripsi_prodi'];
		if(isset($prodi['thumbnail'])){
			$this->thumbnail = $prodi['thumbnail'];
			$this->first_thumbnail = true;
		}
        if(isset($prodi['visi_misi'])){
			$this->visi_misi = $prodi['visi_misi'];
			$this->first_visimisi = true;
		}
        if(isset($prodi['logo_prodi'])){
			$this->logo_prodi = $prodi['logo_prodi'];
			$this->first_logoprodi = true;
		}
        if(isset($prodi['struktur'])){
			$this->struktur = $prodi['struktur'];
			$this->first_struktur = true;
		}
		$this->subdomain = $prodi['subdomain'];
	}

	public function update(){
        $this->validate();
		$thumbnail = null;
        $visi_misi = null;
        $logo_prodi = null;
		$data = [];
		if(isset($this->thumbnail)){
			if(!$this->first_thumbnail){
				$thumbnail = $this->thumbnail->getFilename();
				$this->thumbnail->storeAs('public/images', $thumbnail);
			} else {
				$thumbnail = $this->thumbnail;
			}
		}
        if(isset($this->visi_misi)){
			if(!$this->first_visimisi){
				$visi_misi = $this->visi_misi->getFilename();
				$this->visi_misi->storeAs('public/images', $visi_misi);
			} else {
				$visi_misi = $this->visi_misi;
			}
		}
        if(isset($this->logo_prodi)){
			if(!$this->first_logoprodi){
				$logo_prodi = $this->logo_prodi->getFilename();
				$this->logo_prodi->storeAs('public/images', $logo_prodi);
			} else {
				$logo_prodi = $this->logo_prodi;
			}
		}
        if(isset($this->struktur)){
			if(!$this->first_struktur){
				$struktur = $this->struktur->getFilename();
				$this->struktur->storeAs('public/images', $struktur);
			} else {
				$struktur = $this->struktur;
			}
		}
		$data['thumbnail'] = $thumbnail;
		$data['nama_prodi'] = $this->nama_prodi;
		$data['deskripsi_prodi'] = $this->deskripsi_prodi;
		$data['subdomain'] = $this->subdomain;
        $data['visi_misi'] = $visi_misi;
        $data['logo_prodi'] = $logo_prodi;
        $data['struktur'] = $struktur;
		if($this->prodi_id){
			$prodi = Prodi::find($this->prodi_id);
			$prodi->update($data);
		}
		$this->reset();
		$this->emit('refreshProdi', $prodi);
		if(isset($this->thumbnail) && (!$this->first_thumbnail)){
			$this->thumbnail->delete();
			$this->thumbnail = null;
		}
	}

	public function removeThumbnail(){
		if(!$this->first_thumbnail){
			$this->thumbnail->delete();
		}
		$this->first_thumbnail = false;
		$this->thumbnail = null;
	}

    public function removeVisimisi(){
		if(!$this->first_visimisi){
			$this->visi_misi->delete();
		}
		$this->first_visimisi = false;
		$this->visi_misi = null;
	}

    public function removeLogoprodi(){
		if(!$this->first_logoprodi){
			$this->logo_prodi->delete();
		}
		$this->first_logoprodi = false;
		$this->logo_prodi = null;
	}

    public function removeStruktur(){
		if(!$this->first_struktur){
			$this->struktur->delete();
		}
		$this->first_struktur = false;
		$this->struktur = null;
	}
}

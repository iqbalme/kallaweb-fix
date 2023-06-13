<?php

namespace App\Http\Livewire\Facility;

use Livewire\Component;
use App\Models\FasilitasModel;

class FacilityIndex extends Component
{
	public $data;
	public $galeri_id = null;
	
	protected $listeners = [
		'refreshGaleri'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data = FasilitasModel::orderByDesc('created_at')->get();
        return view('livewire.facility.facility-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Fasilitas']);
    }
	
	public function refreshGaleri(){
		$this->reset();
	}
	
	public function tambahFasilitas(){
		$this->dispatchBrowserEvent('bukaFormGaleri');
	}
	
	public function setGaleriId($id){
		$this->galeri_id = $id;
		$this->dispatchBrowserEvent('bukaModalHapus');
	}
	
	public function hapusGaleri(){
		$galeri = FasilitasModel::find($this->galeri_id);
		$galeri->delete();
		$this->galeri_id = null;
		$this->closeFormHapus();
	}
	
	public function closeFormHapus(){
		$this->dispatchBrowserEvent('closeHapusGaleri');
	}

}

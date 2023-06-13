<?php

namespace App\Http\Livewire\Testimoni;

use Livewire\Component;
use App\Models\Testimoni;

class TestimoniIndex extends Component
{
	public $data;
	public $testimoni_id = null;
	public $testimoni = null;
	public $isUpdate = false;
	
	protected $listeners = [
		'refreshTestimoni'
	];
	
    public function render()
    {
		$this->data = Testimoni::all();
		$this->emit('getTestimoni', $this->testimoni);
        return view('livewire.testimoni.testimoni-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Testimoni']);
    }
	
	public function refreshTestimoni(){
		$this->reset();
	}
	
	public function getTestimoni($id){
		$this->testimoni = Testimoni::find($id);
		$this->isUpdate = true;
		$this->bukaFormTestimoniEdit();
	}
	
	public function hapusTestimoni($id){
		$this->testimoni_id = $id;
		$this->isUpdate = false;
		$this->bukaFormHapus();
	}
	
	public function hapusTestimoniItem(){
		Testimoni::find($this->testimoni_id)->delete();
		$this->closeHapusForm();
	}
	
	public function closeHapusForm(){
		$this->dispatchBrowserEvent('closeHapusTestimoni');
	}
	
	public function bukaFormHapus(){
		$this->dispatchBrowserEvent('bukaFormHapus');
	}
	
	public function bukaFormTestimoni(){
		$this->reset();
		$this->dispatchBrowserEvent('bukaFormTestimoni');
	}
	
	public function bukaFormTestimoniEdit(){
		$this->dispatchBrowserEvent('bukaFormTestimoniEdit');
	}

}

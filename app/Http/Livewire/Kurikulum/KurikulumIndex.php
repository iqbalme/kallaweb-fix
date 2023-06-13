<?php

namespace App\Http\Livewire\Kurikulum;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kurikulum;

class KurikulumIndex extends Component
{
	use WithPagination;
	
	public $data;
	public $kurikulum_id = null;
	public $kurikulum = null;
	public $isUpdate = false;
	public $perhalaman = 5;
	public $cari_kurikulum = '';
	
	public $listeners = ['refreshKurikulum'];
	
    public function render()
    {
		$this->data['kurikulum'] = Kurikulum::orderBy('created_at', 'desc')->where('soal', 'LIKE', '%'.$this->cari_kurikulum.'%')->orWhere('jawaban', 'LIKE', '%'.$this->cari_kurikulum.'%')->paginate($this->perhalaman);
		//$this->emit('getEvent', $this->event);
        return view('livewire.kurikulum.kurikulum-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'kurikulum']);
    }
	
	public function getKurikulum($id){
		$kurikulum = Kurikulum::find($id);
		$this->isUpdate = true;
		$this->emitTo('kurikulum.kurikulum-update', 'setKurikulum', $kurikulum);
		$this->dispatchBrowserEvent('bukaFormKurikulumEdit');
	}
	
	public function hapusKurikulum($id){
		$this->kurikulum_id = $id;
		$this->isUpdate = false;
	}
	
	public function hapusKurikulumItem(){
		$kurikulum = Kurikulum::find($this->kurikulum_id);
		$kurikulum->delete();
		$this->dispatchBrowserEvent('closeHapusKurikulum');
	}
	
	public function refreshKurikulum(){
		$this->isUpdate = false;
	}
}

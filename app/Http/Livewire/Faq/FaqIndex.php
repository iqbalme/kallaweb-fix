<?php

namespace App\Http\Livewire\Faq;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FAQ;

class FaqIndex extends Component
{
	use WithPagination;
	
	public $data;
	public $faq_id = null;
	public $faq = null;
	public $isUpdate = false;
	public $perhalaman = 5;
	public $cari_faq = '';
	
	public $listeners = ['refreshFaq'];
	
    public function render()
    {
		$this->data['faq'] = FAQ::orderBy('created_at', 'desc')->where('soal', 'LIKE', '%'.$this->cari_faq.'%')->orWhere('jawaban', 'LIKE', '%'.$this->cari_faq.'%')->paginate($this->perhalaman);
		//$this->emit('getEvent', $this->event);
        return view('livewire.faq.faq-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'FAQ']);
    }
	
	public function getFaq($id){
		$faq = FAQ::find($id);
		$this->isUpdate = true;
		$this->emitTo('faq.faq-update', 'setFaq', $faq);
		$this->dispatchBrowserEvent('bukaFormFaqEdit');
	}
	
	public function hapusFaq($id){
		$this->faq_id = $id;
		$this->isUpdate = false;
	}
	
	public function hapusFaqItem(){
		$faq = FAQ::find($this->faq_id);
		$faq->delete();
		$this->dispatchBrowserEvent('closeHapusFaq');
	}
	
	public function refreshFaq(){
		$this->isUpdate = false;
	}
}

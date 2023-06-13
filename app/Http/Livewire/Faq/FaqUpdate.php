<?php

namespace App\Http\Livewire\Faq;

use Livewire\Component;
use App\Models\FAQ;

class FaqUpdate extends Component
{
	public $faq;
	public $listeners = ['setFaq', 'setJawabanUpdate'];

    protected $rules = [
        'faq.id' => 'required',
        'faq.soal' => 'required',
        'faq.jawaban' => 'required'
    ];

	public function setFaq($faq){
		$this->faq = [
			'id' => $faq['id'],
			'soal' => $faq['soal']
		];
		$this->dispatchBrowserEvent('setInitialJawaban', ['jawaban' => $faq['jawaban']]);
	}

	public function setJawabanUpdate($jawaban){
		$this->faq['jawaban'] = $jawaban;
	}

    public function render()
    {
        return view('livewire.faq.faq-update');
    }

	public function update(){
        $this->validate();
		try{
			$faq = FAQ::find($this->faq['id']);
			$faq->update($this->faq);
			$this->emitUp('refreshFaq');
			$this->dispatchBrowserEvent('setPesanNotif', ['judul' => 'Update Data', 'pesan' => 'Data telah diperbarui', 'tipe' => 'success']);
			$this->dispatchBrowserEvent('closeEditFaq');
		} catch (\Illuminate\Database\QueryException $e){
			$this->dispatchBrowserEvent('setPesanNotif', ['judul' => 'Update Data Gagal', 'pesan' => $e->message, 'tipe' => 'error']);
		}

	}
}

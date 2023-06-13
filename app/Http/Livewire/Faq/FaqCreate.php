<?php

namespace App\Http\Livewire\Faq;

use Livewire\Component;
use App\Models\FAQ;

class FaqCreate extends Component
{
	public $soal = null;
	public $jawaban = null;

	public $listeners = ['setJawaban', 'resetFaq'];

    protected $rules = [
        'soal' => 'required',
        'jawaban' => 'required'
    ];

    public function render()
    {
        return view('livewire.faq.faq-create');
    }

	public function setJawaban($jawaban){
		$this->jawaban = $jawaban;
	}

	public function resetFaq(){
		$this->reset();
		$this->dispatchBrowserEvent('setInitialJawaban');
	}

	public function simpan(){
        $this->validate();
		$faq = [
			'soal' => $this->soal,
			'jawaban' => $this->jawaban
		];
		FAQ::create($faq);
		$this->emitUp('refreshFaq');
		$this->dispatchBrowserEvent('closeModalFaq');
	}
}

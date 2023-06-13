<?php

namespace App\Http\Livewire\Kurikulum;

use Livewire\Component;
use App\Models\Kurikulum;
use App\Http\Traits\CommonTrait;

class KurikulumCreate extends Component
{
	use CommonTrait;

	public $soal = null;
	public $jawaban = null;
	public $data;
	public $kurikulum_prodi = null;

	public $listeners = ['setJawaban', 'resetKurikulum'];

    protected $rules = [
        'soal' => 'required',
        'jawaban' => 'required'
    ];

    public function render()
    {
		$prodis = $this->getAdminProdi();
		$this->data['prodis'] = $prodis;
        return view('livewire.kurikulum.kurikulum-create');
    }

	public function setJawaban($jawaban){
		$this->jawaban = $jawaban;
	}

	public function resetKurikulum(){
		$this->reset();
		$this->dispatchBrowserEvent('setInitialJawabanKur');
	}

	public function simpan(){
        $this->validate();
		$kurikulum = [
			'soal' => $this->soal,
			'jawaban' => $this->jawaban,
			'prodi_id' => $this->kurikulum_prodi
		];
		Kurikulum::create($kurikulum);
		$this->resetKurikulum();
		$this->emitUp('refreshKurikulum');
		$this->dispatchBrowserEvent('closeModalKurikulum');
	}
}

<?php

namespace App\Http\Livewire\Kurikulum;

use Livewire\Component;
use App\Models\Kurikulum;
use App\Http\Traits\CommonTrait;

class KurikulumUpdate extends Component
{
	use CommonTrait;

	public $kurikulum;
	public $data;
	public $listeners = ['setKurikulum', 'setJawabanUpdate'];

    protected $rules = [
        'kurikulum.id' => 'required',
        'kurikulum.soal' => 'required',
        // 'kurikulum.jawaban' => 'required',
		'kurikulum.prodi_id' => 'required'
    ];

	public function setKurikulum($kurikulum){
		$this->kurikulum = [
			'id' => $kurikulum['id'],
			'soal' => $kurikulum['soal'],
			'prodi_id' => $kurikulum['prodi_id']
		];
		$this->dispatchBrowserEvent('setInitialJawaban', ['jawaban' => $kurikulum['jawaban']]);
	}

	public function setJawabanUpdate($jawaban){
		$this->kurikulum['jawaban'] = $jawaban;
	}

    public function render()
    {
		$prodis = $this->getAdminProdi();
		$this->data['prodis'] = $prodis;
        return view('livewire.kurikulum.kurikulum-update');
    }

	public function update(){
        $this->validate();
		try{
			$kurikulum = Kurikulum::find($this->kurikulum['id']);
			$kurikulum->update($this->kurikulum);
			$this->emitUp('refreshKurikulum');
			$this->dispatchBrowserEvent('setPesanNotif', ['judul' => 'Update Data', 'pesan' => 'Data telah diperbarui', 'tipe' => 'success']);
			$this->dispatchBrowserEvent('closeEditKurikulum');
		} catch (\Illuminate\Database\QueryException $e){
			$this->dispatchBrowserEvent('setPesanNotif', ['judul' => 'Update Data Gagal', 'pesan' => "Error Update Data", 'tipe' => 'error']);
		}

	}
}

<?php

namespace App\Http\Livewire\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use Livewire\WithFileUploads;

class PengumumanCreate extends Component
{
	use WithFileUploads;

	public $judul = null;
	public $file_pengumuman = null;

	public $listeners = ['resetPengumuman'];

    protected $rules = [
        'judul' => 'required',
        'file_pengumuman' => 'required'
    ];

    public function render()
    {
        return view('livewire.pengumuman.pengumuman-create');
    }

	public function resetPengumuman(){
		$this->reset();
	}

	public function hapusFilePengumuman(){
		$this->file_pengumuman->delete();
		$this->file_pengumuman = null;
	}

	public function simpan(){
        $this->validate();
		$file_pengumuman = $this->file_pengumuman->getFilename();
		$this->file_pengumuman->storeAs('public/files', $file_pengumuman);
		$data = [
			'judul' => $this->judul,
			'file_pengumuman' => $file_pengumuman
		];
		Pengumuman::create($data);
		$this->file_pengumuman = null;
		$this->emitUp('refreshPengumuman');
		$this->dispatchBrowserEvent('closeCreatePengumuman');
	}
}

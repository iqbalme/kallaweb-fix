<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Voucher;
use Livewire\WithFileUploads;
use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Traits\CommonTrait;

class EventCreate extends Component
{
    use CommonTrait;
	use WithFileUploads;
    use AuthorizesRequests;

	public $is_voucher = false;
	public $voucher_id = null;
	public $vouchers = null;
	public $nama_event = null;
	public $deskripsi_event = null;
	public $tanggal = null;
	public $waktu_mulai = null;
	public $waktu_akhir = null;
	public $lokasi = null;
	public $gambar = null;
	public $event_voucher = null;
	public $is_link = false;
	public $link_daftar = null;
    public $data;
    public $event_prodis = [1];

	protected $listeners = ['setEvent'];

    protected $rules = [
        'nama_event' => 'required',
        'deskripsi_event' => 'required',
        'waktu_mulai' => 'required',
        'waktu_akhir' => 'required',
        'gambar' => 'required',
        'link_daftar' => 'requiredIf:islink,true'
    ];

	public function mount(){
		$this->vouchers = Voucher::where('aktif', 1)->get();
        $this->data['prodis'] = $this->getAdminProdi();
	}

    public function render()
    {
        return view('livewire.event.event-create');
    }

	public function hapusGambar(){
		$this->gambar->delete();
		$this->gambar = null;
	}

	public function setEvent($value){
		$this->deskripsi_event = $value;
	}

	public function simpan(){
        $this->validate();
		$gambar = null;
		$voucher_id = null;
		$link_daftar = null;
        $event_prodis = [];
		if($this->is_link){
			$voucher_id = null;
			$link_daftar = $this->link_daftar;
		} else {
			$link_daftar = null;
			if(isset($this->voucher_id)){
				$voucher_id = $this->voucher_id;
			}
		}
		if(isset($this->gambar)){
			$gambar = $this->gambar->getFilename();
			$this->gambar->storeAs('public/images', $gambar);
			$this->gambar = null;
		}
		$data = [
			'nama_event' => $this->nama_event,
			'deskripsi_event' => $this->deskripsi_event,
			'waktu_mulai' => $this->tanggal.' '.$this->waktu_mulai,
			'waktu_berakhir' => $this->tanggal.' '.$this->waktu_akhir,
			'gambar_event' => $gambar,
			'lokasi' => $this->lokasi,
			'link_daftar' => $link_daftar,
			'voucher_id' => $voucher_id
		];
        if(count($this->data['prodis']) == 1){
            $event_prodis[] = ['prodi_id' => $this->data['prodis'][0]['id']];
        } else {
            foreach ($this->event_prodis as $prodis) {
                $event_prodis[] = ['prodi_id' => $prodis];
            }
        }
		if($data['waktu_mulai'] <= $data['waktu_berakhir']){
			$event = Event::create($data);
            $event->event_prodi()->createMany($event_prodis);
			$this->emit('refreshEvent');
			$this->resetExcept('data');
			$this->closeModal();
		}
	}

	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalEvent');
	}

	public function updatedIsLink($value){
		if($value){
			$this->is_voucher = false;
		}
	}
}

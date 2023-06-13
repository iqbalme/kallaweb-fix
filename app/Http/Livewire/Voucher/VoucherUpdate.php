<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;
use App\Models\Voucher;
use App\Models\Katalog;

class VoucherUpdate extends Component
{
	public $voucher_id = null;
	public $kode_voucher = null;
	public $nominal_diskon;
	public $tipe_diskon;
	public $deskripsi_voucher;
	public $nama_voucher = null;
	public $awal_berlaku;
	public $akhir_berlaku;
	public $aktif;
	public $voucher = null;

	protected $listeners = [
		'getVoucher'
	];

    protected $rules = [
        'voucher_id' => 'required',
        'nama_voucher' => 'required',
        'deskripsi_voucher' => 'required',
        'nominal_diskon' => 'required',
        'kode_voucher' => 'required',
    ];

	public function setData($voucher){
		$this->voucher_id = $voucher['id'];
		$this->kode_voucher = $voucher['kode_voucher'];
		$this->nominal_diskon  = $voucher['nominal_diskon'];
		$this->tipe_diskon = $voucher['tipe_diskon'];
		$this->deskripsi_voucher = $voucher['deskripsi_voucher'];
		$this->nama_voucher = $voucher['nama_voucher'];
		$this->awal_berlaku = isset($voucher['awal_berlaku']) ? date('Y-m-d', strtotime($voucher['awal_berlaku'])) : '';
		$this->akhir_berlaku = isset($voucher['akhir_berlaku']) ? date('Y-m-d', strtotime($voucher['akhir_berlaku'])) : '';
		$this->aktif = $voucher['aktif'];
	}

	public function render()
    {
        return view('livewire.voucher.voucher-update');
    }

	public function generateVoucher(){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$this->kode_voucher = strtoupper(substr(str_shuffle($permitted_chars), 0, 10));
	}

	public function resetInput(){
		$this->voucher_id = null;
		$this->kode_voucher = null;
		$this->nominal_diskon  = null;
		$this->tipe_diskon = 'persen';
		$this->deskripsi_voucher = null;
		$this->nama_voucher = null;
		$this->awal_berlaku = null;
		$this->akhir_berlaku = null;
		$this->aktif = false;
	}

	public function update(){
        $this->validate();
		$data = [
			'kode_voucher' => $this->kode_voucher,
			'nominal_diskon' => $this->nominal_diskon,
			'tipe_diskon' => $this->tipe_diskon,
			'deskripsi_voucher' => $this->deskripsi_voucher,
			'nama_voucher' => $this->nama_voucher,
			'awal_berlaku' => ($this->awal_berlaku == '') ? null : $this->awal_berlaku,
			'akhir_berlaku' => ($this->akhir_berlaku == '') ? null : $this->akhir_berlaku,
			'aktif' => $this->aktif
		];
		$voucher = Voucher::find($this->voucher_id);
		$voucher->update($data);
		$this->resetInput();
		$this->emit('refreshVoucher');
	}

	public function getVoucher($voucher){
		//dd(gettype($voucher));
		$this->setData($voucher);
	}
}

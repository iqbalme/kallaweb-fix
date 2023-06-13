<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;
use App\Models\Voucher;

class VoucherIndex extends Component
{
	public $data;
	public $voucher_id = null;
	public $voucher = null;
	public $isVoucherUpdate = false;
	public $isVoucherForm = false;
	public $datavoucher = false;
	public $perhalaman = 5;
	public $cari_voucher = '';
	
	protected $listeners = [
		'refreshVoucher'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data['vouchers'] = Voucher::orderBy('id', 'DESC')->where('nama_voucher', 'LIKE', '%'.$this->cari_voucher.'%')->orWhere('deskripsi_voucher', 'LIKE', '%'.$this->cari_voucher.'%')->orWhere('kode_voucher', 'LIKE', '%'.$this->cari_voucher.'%')->paginate($this->perhalaman);
		$this->emit('getVoucher', $this->voucher);
        return view('livewire.voucher.voucher-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Katalog / Voucher']);
    }
	
	public function tambahVoucher(){
		$this->emit('addVoucher');
	}
	
	public function updateVoucher(){
		$this->emit('updateVoucher');
	}
	
	public function setVoucherId($id){
		$this->voucher_id = $id;
	}
	
	public function hapusVoucher($id){
		Voucher::find($id)->delete();
	}
	
	public function getVoucher($id){
		$this->isVoucherUpdate = true;
		$this->voucher = Voucher::find($id);
	}
	
	public function addFormVoucher(){
		$this->isVoucherUpdate = false;
	}
	
	public function refreshVoucher(){
		
	}
}
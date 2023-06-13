<?php

namespace App\Http\Livewire\Katalog;

use Livewire\Component;
use App\Models\Katalog;

class KatalogIndex extends Component
{
	public $data;
	public $katalog_id = null;
	public $isFormVisible = false;
	public $isUpdate = false;
	public $isVoucherUpdate = false;
	public $isVoucherForm = false;
	public $perhalaman = 5;
	public $cari_katalog = '';
	
	protected $listeners = [
		'refreshKatalog', 'batalkanKatalog'
	];
	
    public function render()
    {
		$this->data['katalog'] = Katalog::orderBy('id', 'DESC')->where('nama_katalog', 'LIKE', '%'.$this->cari_katalog.'%')->orWhere('deskripsi_katalog', 'LIKE', '%'.$this->cari_katalog.'%')->paginate($this->perhalaman);
        return view('livewire.katalog.katalog-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Katalog / List']);
    }
	
	public function tambahKatalog(){
		$this->isVoucherForm = false;
		$this->isFormVisible = true;
	}
	
	public function batalkanKatalog(){
		$this->isFormVisible = false;
	}
	
	public function tambahVoucher(){
		$this->isVoucherForm = true;
		$this->isFormVisible = false;
		$this->emit('addVoucher');
	}

	public function hapusKatalog($id){
		Katalog::find($id)->delete();
		$this->isFormVisible = false;
		$this->isUpdate = false;
		$this->katalog_id = null;
	}
	
	public function refreshKatalog(){
		$this->isFormVisible = false;
		$this->isUpdate = false;
	}
	
	public function setPostId($id){
		$this->katalog_id = $id;
	}
	
	public function getKatalog($id){
		$this->isUpdate = true; //jika ini edit, bukan tambah
		$this->isFormVisible = true;
		$katalog = Katalog::find($id);
		$this->emit('getKatalog', $katalog);
	}
}

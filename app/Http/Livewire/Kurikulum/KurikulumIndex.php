<?php

namespace App\Http\Livewire\Kurikulum;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kurikulum;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;

class KurikulumIndex extends Component
{
	use WithPagination;
	
	public $data;
	public $kurikulum_id = null;
	public $kurikulum = null;
	public $isUpdate = false;
	public $perhalaman = 5;
	public $cari_kurikulum = '';
	
	public $listeners = ['refreshKurikulum'];
	
    public function render()
    {
		$kurikulum = null;
		if(Auth::user()->id == 1){
			$kurikulum = Kurikulum::orderByDesc('id')->where(function($query){$query->where('soal', 'LIKE', '%'.$this->cari_kurikulum.'%')->orWhere('jawaban', 'LIKE', '%'.$this->cari_kurikulum.'%');})->paginate($this->perhalaman);
		} else {
			$ids_kurikulum = [];
			$ids_prodi = [];
			$current_user_roles = Auth::user()->role_users;
			foreach($current_user_roles as $current_role){
				$ids_prodi[] = $current_role->roles->prodi_id;
			}
		// 	//jika role adalah admin web utama
			if(in_array(1, $ids_prodi)){
				$kurikulum = Kurikulum::orderByDesc('id')->where(function($query){$query->where('soal', 'LIKE', '%'.$this->cari_kurikulum.'%')->orWhere('jawaban', 'LIKE', '%'.$this->cari_kurikulum.'%');})->paginate($this->perhalaman);
			} else {
				$kurikulum_ids = Kurikulum::whereIn('prodi_id', $ids_prodi)->get();
				foreach($kurikulum_ids as $ids){
					$ids_kurikulum[] = $ids->id;
				}
				$kurikulum = Kurikulum::whereIn('id', $ids_kurikulum)->where(function($query){$query->where('soal', 'LIKE', '%'.$this->cari_kurikulum.'%')->orWhere('jawaban', 'LIKE', '%'.$this->cari_kurikulum.'%');})->orderByDesc('id')->paginate($this->perhalaman);
			}	
		}
		// $list_kurikulum = [];
		// foreach($kurikulum as $kur){
		// 	$nama_prodi = Prodi::find($kur->prodi_id)->nama_prodi;
		// 	$list_kurikulum[] = ['id' => $kur->id, 'soal' => $kur->soal, 'jawaban' => $kur->jawaban, 'nama_prodi' => $nama_prodi];
		// }
		$this->data['kurikulum'] = $kurikulum;
		//$this->emit('getEvent', $this->event);
        return view('livewire.kurikulum.kurikulum-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'kurikulum']);
    }
	
	public function getKurikulum($id){
		$kurikulum = Kurikulum::find($id);
		$this->isUpdate = true;
		$this->emitTo('kurikulum.kurikulum-update', 'setKurikulum', $kurikulum);
		$this->dispatchBrowserEvent('bukaFormKurikulumEdit');
	}
	
	public function hapusKurikulum($id){
		$this->kurikulum_id = $id;
		$this->isUpdate = false;
	}
	
	public function hapusKurikulumItem(){
		$kurikulum = Kurikulum::find($this->kurikulum_id);
		$kurikulum->delete();
		$this->dispatchBrowserEvent('closeHapusKurikulum');
	}
	
	public function refreshKurikulum(){
		$this->isUpdate = false;
	}
}

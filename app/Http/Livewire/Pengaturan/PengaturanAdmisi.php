<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;

class PengaturanAdmisi extends Component
{
	public $settings;
	
	public function mount(){
		$settings = Setting::whereIn('nama_setting', ['nominal_admisi','is_voucher','status_pendaftaran','pesan_admisi_non_aktif', 'biaya_layanan_admisi'])->get();
		foreach($settings as $setting){
			if(in_array($setting->nama_setting, ['status_pendaftaran', 'is_voucher'])){
				$setting->isi_setting = (boolean) $setting->isi_setting;
			}
			$this->settings[$setting->nama_setting] = $setting->isi_setting;
		}
	}
	
    public function render()
    {
        return view('livewire.pengaturan.pengaturan-admisi')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Admisi']);
    }
	
	public function saveSettings(){
		$datas = [];

		foreach($this->settings as $key => $val){
			if(in_array($key, ['status_pendaftaran', 'is_voucher'])){
				$val = (boolean) $val;
			}
			$datas[] = [$key, $val];
		}
		//dd($datas);
		foreach($datas as $data){
			Setting::updateOrCreate(
				['nama_setting' => $data[0]], ['isi_setting' => $data[1]]
			);			
		}
		return redirect()->route('pengaturan.admisi');
	}
}

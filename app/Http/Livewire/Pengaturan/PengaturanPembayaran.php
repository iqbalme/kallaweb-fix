<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;

class PengaturanPembayaran extends Component
{
	public $settings;
	public $messageSave;
	
	public function mount(){
		$settings = Setting::whereIn('nama_setting', ['xendit_callback_token','xendit_key_secret','xendit_key_public','mode_pembayaran'])->get();
		foreach($settings as $setting){
			$this->settings[$setting->nama_setting] = $setting->isi_setting;
		}
	}
	
    public function render()
    {
        return view('livewire.pengaturan.pengaturan-pembayaran')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Pembayaran']);
    }
	
		public function saveSettings(){
		$datas = [];

		foreach($this->settings as $key => $val){
			$datas[] = [$key, $val];
		}
		//dd($datas);
		foreach($datas as $data){
			Setting::updateOrCreate(
				['nama_setting' => $data[0]], ['isi_setting' => $data[1]]
			);			
		}
		$this->messageSave = true;
		return redirect()->route('pengaturan.pembayaran');
	}
}

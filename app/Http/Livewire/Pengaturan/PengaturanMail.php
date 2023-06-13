<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;

class PengaturanMail extends Component
{
	public $settings;
	public $messageSave = false;
	
	public function mount(){
		$settings = Setting::whereIn('nama_setting', ['smtp_server','smtp_port','smtp_username','smtp_password','email_nama','email_pengirim'])->get();
		foreach($settings as $setting){
			$this->settings[$setting->nama_setting] = $setting->isi_setting;
		}
	}
	
    public function render()
    {
        return view('livewire.pengaturan.pengaturan-mail')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Mail']);
    }
	
	public function saveSettings(){
		$datas = [];
		foreach($this->settings as $key => $val){
			$datas[] = [$key,$val];
		}
		//dd($datas);
		foreach($datas as $data){
			Setting::updateOrCreate(
				['nama_setting' => $data[0]], ['isi_setting' => $data[1]]
			);			
		}
		$this->messageSave = true;
		return redirect()->route('pengaturan.mail');
	}
}

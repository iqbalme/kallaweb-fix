<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;
use App\Http\Traits\CommonTrait;

class PengaturanWebhook extends Component
{
    use CommonTrait;
	public $setting;

	public function mount(){
		$this->setting = Setting::where('nama_setting', 'admisi_webhook_url')->first()->isi_setting;
	}

    public function render()
    {
        return view('livewire.pengaturan.pengaturan-webhook')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Webhook']);
    }

	public function saveSettings(){

        try{
            Setting::updateOrCreate(
				['nama_setting' => 'admisi_webhook_url'], ['isi_setting' => $this->setting]
			);
            $this->setActionNotif('Berhasil', 'Webhook admisi setting telah disimpan', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', 'Gagal menyimpan pengaturan webhoook admisi', 'error');
        }
		return redirect()->route('pengaturan.webhook');
	}
}

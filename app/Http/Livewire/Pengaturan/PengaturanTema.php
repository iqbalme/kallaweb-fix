<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;

class PengaturanTema extends Component
{
	public $settings;
	public $messageSave = false;
	
	protected $listeners = ['setMessageFalse'];
	
	public function mount(){
		$this->settings['theme_color_sidebar_bg'] = Setting::firstOrCreate(['nama_setting' => 'theme_color_sidebar_bg'], ['isi_setting' => '#404040'])->isi_setting;
		$this->settings['theme_color_link'] = Setting::firstOrCreate(['nama_setting' => 'theme_color_link'], ['isi_setting' => '#ffffff'])->isi_setting;
		$this->settings['theme_color_link_active'] = Setting::firstOrCreate(['nama_setting' => 'theme_color_link_active'], ['isi_setting' => '#ffffff'])->isi_setting;
		$this->settings['theme_color_link_active_bg'] = Setting::firstOrCreate(['nama_setting' => 'theme_color_link_active_bg'], ['isi_setting' => '#6f66f0'])->isi_setting;
		$this->settings['theme_color_icon_active'] = Setting::firstOrCreate(['nama_setting' => 'theme_color_icon_active'], ['isi_setting' => '#ffffff'])->isi_setting;
		$this->settings['theme_color_link_hover'] = Setting::firstOrCreate(['nama_setting' => 'theme_color_link_hover'], ['isi_setting' => '#efff0a'])->isi_setting;
		$this->settings['theme_color_icon_hover'] = Setting::firstOrCreate(['nama_setting' => 'theme_color_icon_hover'], ['isi_setting' => '#ffffff'])->isi_setting;
	}
	
    public function render()
    {
        return view('livewire.pengaturan.pengaturan-tema')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Tema']);
    }
	
	public function setMessageFalse(){
		$this->messageSave = false;
	}
	
	public function saveSettings(){
		foreach($this->settings as $key => $val){
			Setting::updateOrCreate(
				['nama_setting' => $key], ['isi_setting' => $val]
			);
		}
		$this->messageSave = true;
		return redirect()->route('pengaturan.tema');
	}
}
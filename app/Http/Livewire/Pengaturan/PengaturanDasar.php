<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;

class PengaturanDasar extends Component
{
	use WithFileUploads;
	public $settings;
	public $messageSave = false;
	public $isLogoInitialized = false; //is web logo showed for the first time from database
	public $isIconInitialized = false; //is web icon showed for the first time from database
	public $isStrukturInitialized = false; //is institute org structure showed for the first time from database
	public $isBiayaKuliahInitialized = false;
	public $isRegistrasiUlangInitialized = false;
	public $isInfoBeasiswaInitialized = false;
	public $isRegistrationClosedPic = false;
	
	protected $listeners = [
		'setMessageSaveFalse'
	];
	
	protected $rules = [
        //"settings['web_title']" => "required"
    ];
	
	public function mount(){
		$settings = Setting::all();
		foreach($settings as $setting){
			if($setting->nama_setting == 'post_slug'){
				$this->settings['post_slug'] = (int) $setting->isi_setting;
			} else {
				$this->settings[$setting->nama_setting] = $setting->isi_setting;
			}
		}
		if(isset($this->settings['web_logo'])){
			$this->isLogoInitialized = true;
		}
		if(isset($this->settings['web_icon'])){
			$this->isIconInitialized = true;
		}
		if(isset($this->settings['struktur_organisasi'])){
			$this->isStrukturInitialized = true;
		}
		if(isset($this->settings['info_beasiswa'])){
			$this->isInfoBeasiswaInitialized = true;
		}
		if(isset($this->settings['biaya_kuliah'])){
			$this->isBiayaKuliahInitialized = true;
		}
		if(isset($this->settings['registrasi_ulang'])){
			$this->isRegistrasiUlangInitialized = true;
		}
		if(isset($this->settings['registrasi_tutup_picture'])){
			$this->isRegistrationClosedPic = true;
		}
	}
	
    public function render()
    {
        return view('livewire.pengaturan.pengaturan-dasar')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Dasar']);
    }
	
	public function removeIcon(){
		if(!$this->isIconInitialized){
			$this->settings['web_icon']->delete();
		}
		$this->isIconInitialized = false;
		$this->settings['web_icon'] = null;
	}
	
	public function removeLogo(){
		if(!$this->isLogoInitialized){
			$this->settings['web_logo']->delete();
		}
		$this->isLogoInitialized = false;
		$this->settings['web_logo'] = null;
	}
	
	public function removeStruktur(){
		if(!$this->isStrukturInitialized){
			$this->settings['struktur_organisasi']->delete();
		}
		$this->isStrukturInitialized = false;
		$this->settings['struktur_organisasi'] = null;
	}

	public function removeBiayaKuliah(){
		if(!$this->isBiayaKuliahInitialized){
			$this->settings['biaya_kuliah']->delete();
		}
		$this->isBiayaKuliahInitialized = false;
		$this->settings['biaya_kuliah'] = null;
	}

	public function removeRegistrasiUlang(){
		if(!$this->isRegistrasiUlangInitialized){
			$this->settings['registrasi_ulang']->delete();
		}
		$this->isRegistrasiUlangInitialized = false;
		$this->settings['registrasi_ulang'] = null;
	}

	public function removeInfoBeasiswa(){
		if(!$this->isInfoBeasiswaInitialized){
			$this->settings['info_beasiswa']->delete();
		}
		$this->isInfoBeasiswaInitialized = false;
		$this->settings['info_beasiswa'] = null;
	}

	public function removeGambarRegistrasiTutup(){
		if(!$this->isRegistrationClosedPic){
			$this->settings['registrasi_tutup_picture']->delete();
		}
		$this->isRegistrationClosedPic = false;
		$this->settings['registrasi_tutup_picture'] = null;
	}
	
	public function setMessageSaveFalse(){
		$this->messageSave = false;
	}
	
	public function saveSettings(){
		$datas = [];
		
		if(isset($this->settings['web_logo'])){
			if(!$this->isLogoInitialized){
				$logo_name = $this->settings['web_logo']->getFilename();
				$this->settings['web_logo']->storeAs('public/images', $logo_name);
				$this->settings['web_logo']->delete();
				$datas[] = ['web_logo', $logo_name];
			}
		} else {
			$datas[] = ['web_logo', null];
		}
		if(isset($this->settings['web_icon'])){
			if(!$this->isIconInitialized){
				$icon_name = $this->settings['web_icon']->getFilename();
				$this->settings['web_icon']->storeAs('public/images', $icon_name);
				$this->settings['web_icon']->delete();
				$datas[] = ['web_icon', $icon_name];
			}
		} else {
			$datas[] = ['web_icon', null];
		}
		if(isset($this->settings['struktur_organisasi'])){
			if(!$this->isStrukturInitialized){
				$struktur_image = $this->settings['struktur_organisasi']->getFilename();
				$this->settings['struktur_organisasi']->storeAs('public/images', $struktur_image);
				$this->settings['struktur_organisasi']->delete();
				$datas[] = ['struktur_organisasi', $struktur_image];
			}
		} else {
			$datas[] = ['struktur_organisasi', null];
		}
		if(isset($this->settings['biaya_kuliah'])){
			if(!$this->isBiayaKuliahInitialized){
				$biaya_kuliah = $this->settings['biaya_kuliah']->getFilename();
				$this->settings['biaya_kuliah']->storeAs('public/images', $biaya_kuliah);
				$this->settings['biaya_kuliah']->delete();
				$datas[] = ['biaya_kuliah', $biaya_kuliah];
			}
		} else {
			$datas[] = ['biaya_kuliah', null];
		}
		if(isset($this->settings['registrasi_ulang'])){
			if(!$this->isRegistrasiUlangInitialized){
				$registrasi_ulang = $this->settings['registrasi_ulang']->getFilename();
				$this->settings['registrasi_ulang']->storeAs('public/images', $registrasi_ulang);
				$this->settings['registrasi_ulang']->delete();
				$datas[] = ['registrasi_ulang', $registrasi_ulang];
			}
		} else {
			$datas[] = ['registrasi_ulang', null];
		}
		if(isset($this->settings['info_beasiswa'])){
			if(!$this->isInfoBeasiswaInitialized){
				$info_beasiswa = $this->settings['info_beasiswa']->getFilename();
				$this->settings['info_beasiswa']->storeAs('public/images', $info_beasiswa);
				$this->settings['info_beasiswa']->delete();
				$datas[] = ['info_beasiswa', $info_beasiswa];
			}
		} else {
			$datas[] = ['info_beasiswa', null];
		}
		if(isset($this->settings['registrasi_tutup_picture'])){
			if(!$this->isRegistrationClosedPic){
				$registrasi_tutup_picture = $this->settings['registrasi_tutup_picture']->getFilename();
				$this->settings['registrasi_tutup_picture']->storeAs('public/images', $registrasi_tutup_picture);
				$this->settings['registrasi_tutup_picture']->delete();
				$datas[] = ['registrasi_tutup_picture', $registrasi_tutup_picture];
			}
		} else {
			$datas[] = ['registrasi_tutup_picture', null];
		}
		foreach($this->settings as $key => $val){
			$checked_keys = ['web_logo', 'web_icon', 'struktur_organisasi', 'biaya_kuliah', 'registrasi_ulang', 'info_beasiswa', 'registrasi_tutup_picture'];
			if(!in_array($key, $checked_keys)){
				$datas[] = [$key, $val];
			}
		}
		//dd($datas);
		foreach($datas as $data){
			Setting::updateOrCreate(
				['nama_setting' => $data[0]], ['isi_setting' => $data[1]]
			);			
		}
		$this->messageSave = true;
		return redirect()->route('pengaturan.dasar');
	}
}
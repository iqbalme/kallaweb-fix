<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Http\Traits\CommonTrait;
use App\Mail\ContactMail;
use App\Models\Setting;

class Contact extends Component
{
	use CommonTrait;

	public $data;
	public $sumber_info;

	public function mount(){
		$this->data['entitas'] = "Siswa";
		$this->data['angkatan'] = "Angkatan 2022";
		$this->data['sumber_info'] = "Guru Sekolah";
		$this->sumber_info = $this->data['sumber_info'];
        $settings = Setting::whereIn('nama_setting', ['alamat','email','no_kontak','facebook','instagram','twitter','youtube', 'tiktok'])->get();
        foreach($settings as $setting){
            $this->data[$setting->nama_setting] = $setting->isi_setting;
        }
	}

    public function render()
    {
        return view('livewire.frontend.contact')
			->extends('layouts.app', ['title' => 'Kontak'])
			->section('content');
    }

	public function kirimPesan(){
		$mail_ct = new ContactMail($this->data);
		$mail_ct->replyTo($this->data['email'], $this->data['nama']);
		$mail_ct->cc('webcracking@gmail.com', 'Muhammad Iqbal');
		if($this->kirimEmail('m.fachrul@kallabs.ac.id', $mail_ct)){
			return redirect()->route('kontak');
		}
	}

	public function updatedSumberInfo(){
		$this->data['sumber_info'] = $this->sumber_info;
		if($this->sumber_info !== 'Mahasiswa Kalla Institute'){
			$this->data['mahasiswa_penunjuk'] = null;
		}
	}
}

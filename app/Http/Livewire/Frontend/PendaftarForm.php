<?php

namespace App\Http\Livewire\Frontend;

use Xendit\Xendit;
use App\Models\Setting;
use App\Models\Voucher;
use App\Models\Prodi;
use Livewire\Component;
use App\Http\Traits\CommonTrait;

class PendaftarForm extends Component
{
	use CommonTrait;

	public $currentStep = 1;
	public $total = 0;
	public $total_after_voucher = 0;
	public $biaya_admisi = 0;
	public $biaya_layanan = 0;
	public $voucher;
	public $settings;
	public $kodeVoucher;
	public $discount = 0;
	public $data;
	public $isDataBenar = false;
	public $prodis;

	protected $rules = [
        'data.nama_lengkap' => 'required',
        'data.no_ktp' => 'required|max:16',
        'data.email' => 'required|email',
        'data.no_hp' => 'required|max:15',
        'data.asal_sekolah' => 'required'
    ];

	public function mount(){
		$this->data['nama_lengkap'] = null;
		$this->data['no_ktp'] = null;
		$this->data['email'] = null;
		$this->data['no_hp'] = null;
		$this->data['asal_sekolah'] = null;

		$settings = Setting::whereIn('nama_setting', ['nominal_admisi','is_voucher','status_pendaftaran', 'biaya_layanan_admisi'])->get();
		foreach($settings as $setting){
			if(in_array($setting->nama_setting, ['status_pendaftaran', 'is_voucher'])){
				$setting->isi_setting = (boolean) $setting->isi_setting;
			}
			$this->settings[$setting->nama_setting] = $setting->isi_setting;
		}
		$this->biaya_admisi = $this->settings['nominal_admisi'];
		$this->biaya_layanan = $this->settings['biaya_layanan_admisi'];
		$this->total = $this->biaya_admisi + $this->biaya_layanan;
		$this->total_after_voucher = $this->total;
		if(!$this->settings['status_pendaftaran']){
			return redirect()->route('admisi-non-aktif');
		}
		$this->prodis = Prodi::where('nama_prodi', '!=', 'Web Utama')->get();
		if($this->prodis->count()){
			$this->data['prodi'] = $this->prodis[0]->id;
		}
	}

    public function render()
    {
        return view('livewire.frontend.pendaftar-form')
			->extends('layouts.app', ['title' => 'Pendaftaran'])
			->section('content');
    }

	public function previous(){
		if($this->currentStep > 0){
			$this->currentStep--;
		}
		$this->render();
	}

	public function next(){
		$this->validate();
		if($this->currentStep < 3){
			$this->currentStep++;
		}
		$this->render();
	}

	public function registrasiBaru(){
		$this->payment();
	}

	public function radeemVoucher(){
		$voucher = Voucher::where(['kode_voucher' => $this->kodeVoucher, 'aktif' => 1]);
		if($voucher->count()){
			$valid = false;
			if((!isset($voucher->first()->awal_berlaku)) && (!isset($voucher->first()->akhir_berlaku))){
				$valid = true;
			} elseif ((isset($voucher->first()->awal_berlaku)) && (isset($voucher->first()->akhir_berlaku))){
				if((date('Y-m-d') >= $voucher->first()->awal_berlaku) && (date('Y-m-d') <= $voucher->first()->akhir_berlaku)){
					$valid = true;
				}
			} elseif ((isset($voucher->first()->awal_berlaku)) && (!isset($voucher->first()->akhir_berlaku))){
				if(date('Y-m-d') >= $voucher->first()->awal_berlaku){
					$valid = true;
				}
			} elseif ((!isset($voucher->first()->awal_berlaku)) && (isset($voucher->first()->akhir_berlaku))){
				if(date('Y-m-d') <= $voucher->first()->akhir_berlaku){
					$valid = true;
				}
			}

			if($valid){
				if($voucher->first()->tipe_diskon == 'persen'){
					$this->discount = $this->biaya_admisi / 100 * $voucher->first()->nominal_diskon;
				} else {
					$this->discount = $voucher->first()->nominal_diskon;
				};
			} else {
				$this->kodeVoucher = null;
				$this->discount = 0;
			}

		} else {
			$this->kodeVoucher = null;
			$this->discount = 0;
		}
		//dd(date('Y-m-d') <= $voucher->first()->akhir_berlaku);
		$this->total_after_voucher = $this->total - $this->discount;
	}

	public function splitName($name){
		$splittedName = [];
		if(strrpos(trim($name), ' ')){
			$explodedName = explode(' ', trim(ucfirst($name)));
			if(count($explodedName) > 2){
				$splittedName = [trim(substr($name, 0, strpos($name, ' '))),trim(substr($name, strpos($name, ' '), strlen($name)))];
			} else {
				$splittedName = $explodedName;
			}
		} else {
			$splittedName = [ucfirst(trim($name))];
		}
		return $splittedName;
	}

	public function payment(){
		$items = [
			[
				'name' => 'Pendaftaran Mahasiswa Baru',
				'quantity' => 1,
				'price' => $this->biaya_admisi
			]
		];
		if($this->biaya_layanan > 0){
			$items[] = [
				'name' => 'Biaya Layanan',
				'quantity' => 1,
				'price' => $this->biaya_layanan
			];
		}
		$nama = $this->splitName($this->data['nama_lengkap']);
		$external_id = $this->generateInvoiceNo();
		if(count($nama) > 1){
			$params['customer']['surname'] = $nama[1];
		}
		$params = [
			'external_id' => $external_id,
			'amount' => $this->total_after_voucher,
			'description' => 'Invoice Pendaftaran Mahasiswa Baru',
			'invoice_duration' => 172800, //48 jam
			'locale' => 'id',
			'customer' => [
				'given_names' => $nama[0],
				'email' => $this->data['email'],
				'mobile_number' => $this->data['no_hp']
			],
			'customer_notification_preference' => [
				'invoice_created' => [
					'whatsapp',
					'sms',
					'email'
				],
				'invoice_reminder' => [
					'whatsapp',
					'sms',
					'email'
				],
				'invoice_paid' => [
					'whatsapp',
					'sms',
					'email'
				],
				'invoice_expired' => [
					'whatsapp',
					'sms',
					'email'
				]
			],
			'success_redirect_url' => route('xendit.success.route'),
			//'success_redirect_url' => 'https://1a91-114-5-247-133.ngrok.io/api/success_payment_callback',
			'failure_redirect_url' => route('xendit.failed.route'),
			//'failure_redirect_url' => 'https://1a91-114-5-247-133.ngrok.io/api/failed_payment_callback',
			'currency' => 'IDR',
			'items' => $items
		  ];
		  $fees = [];
			if($this->discount > 0){
				$fees[] = [
					'type' => 'Diskon Voucher',
					'value' => '-'.$this->discount
				];
			} else {
				$fees[] = [
					'type' => 'Potongan',
					'value' => 0
				];
			}
			$params['fees'] = $fees;
		  $isVoucher = false;
		  if($this->kodeVoucher){
			  $isVoucher = true;
		  }
		$this->buatInvoice($params, $this->data, $isVoucher);
	}
}

<?php
namespace App\Http\Traits;

use Xendit\Xendit;
use App\Models\Setting;
use App\Models\Invoice;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Prodi;
//use Livewire\ComponentConcerns\ReceivesEvents;

trait CommonTrait
{
    //use ReceivesEvents;
	public $xenditApiKey;

	public function __construct(){
		$this->xenditApiKey = Setting::where('nama_setting', 'xendit_key_secret')->first()->isi_setting;
	}

	public function setSlug($string) {
	   $string = str_replace(' ', '-', $string);
	   $string_slug = substr($string,0,100); // Replaces all spaces with hyphens with max 100 characters
	   return preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(trim($string_slug))); // Removes special chars.
	}

	public function removeContentTag($string){
		$content = preg_replace("/<img[^>]+\>/i", "", $string);
		return $content;
	}

	public function getParagraphTag($string){
		$content = preg_match_all("~^<p[^>]*>.*?</p>~im", $string, $output);
		return $output[0];

	}

	public function generateInvoiceNo(){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		return strtoupper(substr(str_shuffle($permitted_chars), 0, 17));
	}

	public function buatInvoice($params, $data, $isVoucher){
		$data_pendaftar = [
			'nama' => $data['nama_lengkap'],
			'email' => $data['email'],
			'hp' => $data['no_hp'],
			'prodi_id' => $data['prodi'],
			'no_ktp' => $data['no_ktp'],
			'asal_sekolah' => $data['asal_sekolah'],
		];
		$invoice_data = [ 'use_voucher' => $isVoucher ];
		$isExist = (bool) Pendaftar::where('email', $data['email'])->count();
		if(!$isExist){
			if($params['amount'] == 0){
				//dd('disini');
				$invoice_data['no_invoice'] = $this->generateInvoiceNo();
				$invoice_data['total'] = 0;
				$invoice_data['xendit_invoice_id'] = null;
				$invoice_data['status_payment'] = 'PAID';
				$invoice_data['channel_pembayaran'] = null;
				$invoice_data['waktu_pembayaran'] = null;
				$data_pendaftar['aktif'] = true;
				if($this->createDataPendaftar($invoice_data, $data_pendaftar)){
					//header('Key: W79AU8HOVKAIIWJIV5F0U57BWEB2ON4UWE5SJ6G3O1JLWSJHZNFSXEACDTUO5456A4V9F6M77LQYMX45NPBVAJCDMSJ913OG0WTLFMXIY42L8A4ESDL0VI7I');
					return redirect()->route('registration.success');
				}
			} else {
				Xendit::setApiKey($this->xenditApiKey);
				$createdInvoice = \Xendit\Invoice::create($params);
				if($createdInvoice){
					$invoice_data['no_invoice'] = $params['external_id'];
					$invoice_data['total'] = $params['amount'];
					$invoice_data['xendit_invoice_id'] = $createdInvoice['id'];
					$invoice_data['status_payment'] = $createdInvoice['status'];
                    $invoice_data['channel_pembayaran'] = null;
                    $invoice_data['waktu_pembayaran'] = null;
					$data_pendaftar['aktif'] = false;
					if($this->createDataPendaftar($invoice_data, $data_pendaftar)){
						return redirect()->away($createdInvoice['invoice_url']);
					}
				}
			}
		} else {
			return false;
		}
	}

    public function setActionNotif($judul, $pesan, $tipe){
        $this->dispatchBrowserEvent('setPesanNotif', ['judul' => $judul, 'pesan' => $pesan, 'tipe' => $tipe]);
    }

	public function createDataPendaftar($invoice_data, $data_pendaftar){
		try{
			$invoice = Invoice::create($invoice_data);
			$pendaftar = new Pendaftar($data_pendaftar);
			$invoice->pendaftar()->save($pendaftar);
			return true;
		} catch (\Illuminate\Database\QueryException $e){
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return false;
			}
		}
	}

	public function paginate2($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total ,$perPage);
    }

	public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

	public function kirimEmail($email_tujuan, Mailable $mail_class){
		$settings = Setting::whereIn('nama_setting', ['smtp_server','smtp_port','smtp_username','smtp_password','email_pengirim','email_nama','smtp_encryption'])->get();
		foreach($settings as $setting){
			$settings[$setting->nama_setting] = $setting->isi_setting;
		}
		$data_pengirim = [
			'address' => $settings['email_pengirim'],
			'name' => $settings['email_nama']
		];
		$data_smtp = [
			'transport' => 'smtp',
			'host' => $settings['smtp_server'],
			'port' => $settings['smtp_port'],
			'encryption' => $settings['smtp_encryption'],
			'username' => $settings['smtp_username'],
			'password' => $settings['smtp_password']
		];
		config()->set('mail.mailers', array_merge(config('mail.mailers'), [
			'smtp2' => $data_smtp
		]));
		config(['mail.from' => $data_pengirim]);
		try {
			Mail::mailer('smtp2')->to([$email_tujuan])->send($mail_class);
			Log::info('Kirim email ke pendaftar');
			return true;
		} catch (\Exception $e) {
			Log::error($e->getMessage());
			return false;
		}
	}

    public function getAdminProdi(){
        $user = Auth::user();
        $ids_prodi = [];
        if($user->id == 1){
            $prodis = Prodi::all();
        } else {
            $current_user_roles = $user->role_users;
            foreach($current_user_roles as $current_role){
                $ids_prodi[] = $current_role->roles->prodi_id;
            }
			//jika role adalah admin web utama
			if(in_array(1, $ids_prodi)){
				$prodis = Prodi::all();
			} else {
				$prodis = Prodi::whereIn('id', array_unique($ids_prodi))->get();
			}
        }
        return $prodis;
    }

}

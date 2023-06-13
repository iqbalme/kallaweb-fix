<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Invoice;
use App\Models\Pendaftar;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function updateInvoice(Request $request){
		$setting_value = [];
		$setting = Setting::whereIn('nama_setting', ['mode_pembayaran','xendit_callback_token'])->get();
		foreach($setting as $val){
			$setting_value[$val->nama_setting] = $val->isi_setting;
		}
		if($setting_value['mode_pembayaran'] == 'live'){
			if($request->header('X-CALLBACK-TOKEN') == $setting_value['xendit_callback_token']){
				$invoice = Invoice::where(['xendit_invoice_id' => $request->id, 'no_invoice' => $request->external_id]);
				if($invoice->count()){
					$invoice_data = $invoice->first();
					if($request->status == 'PAID'){
						$invoice_data->status_payment = $request->status;
						$invoice_data->channel_pembayaran = $request->payment_channel;
						$invoice_data->waktu_pembayaran = date('Y-m-d H:i:s', strtotime($request->paid_at));
                        // dd(date('Y-m-d H:i:s', strtotime($request->updated)));
						$invoice_data->save();
                        //ini debug
						$pendaftar = $invoice_data->pendaftar;
						$pendaftar->aktif = true;
						$invoice_data->pendaftar()->save($pendaftar);
					} elseif ($request->status == 'EXPIRED'){
						$invoice_data->delete();
					};
					return response()->json($invoice_data, 200);
				};
				return response()->json(['message' => 'Sukses validasi callback'], 200);
			} else {
				return response()->json(['message' => 'Gagal validasi callback'], 401);
			}
		} else {
			return response()->json(['message' => 'Sukses validasi callback'], 200);
		}
	}

	public function success_payment_callback(){
		$referer = request()->headers->get('referer');
		if(str_contains($referer, 'xendit.co')){ //jika referer dari xendit
			return redirect()->route('payment.success');
		};
		return redirect()->route('home');
	}

	public function failed_payment_callback(Request $request){
		return redirect()->route('payment.expired');
	}

}

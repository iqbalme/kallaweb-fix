<?php

namespace App\Listeners;

use App\Events\PendaftarRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\registrationMail;
use App\Http\Traits\CommonTrait;
use Ixudra\Curl\Facades\Curl;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class emailPendaftarRegistered implements ShouldQueue
{
    use InteractsWithQueue;
	use CommonTrait;
    public $admisi_webhook_url = null;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->admisi_webhook_url = Setting::where('nama_setting', 'admisi_webhook_url')->first()->isi_setting;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PendaftarRegistered  $event
     * @return void
     */
    public function handle(PendaftarRegistered $event)
    {
        $this->kirimEmail($event->pendaftar->email, new registrationMail($event->pendaftar));
        if(isset($this->admisi_webhook_url)){
            try{
                Curl::to($this->admisi_webhook_url)
                    ->withHeader('secret-key: 7436RGW4GS37FG4F6LLHL')
                    ->withData([
                        "nama" => $event->pendaftar->nama,
                        "email" => $event->pendaftar->nama->email,
                        "hp"=> $event->pendaftar->hp,
                        "no_ktp" => $event->pendaftar->no_ktp,
                        "prodi" => $event->pendaftar->nama_prodi
                    ])
                    ->asJson( true )
                    ->post();
                Log::info('Berhasil mengirim ke webhook admisi');
            } catch(\Exception $e){
                Log::error($e->getMessage());
            }
        }
    }
}

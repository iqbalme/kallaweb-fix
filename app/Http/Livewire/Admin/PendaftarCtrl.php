<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pendaftar;
use App\Http\Traits\CommonTrait;
use Rap2hpoutre\FastExcel\FastExcel;

class PendaftarCtrl extends Component
{
	use CommonTrait;
	public $data;
	public $perhalaman = 5;
	public $cari_pendaftar;

    public function render()
    {
		$this->data['pendaftars'] = Pendaftar::orderBy('id', 'DESC')->where('nama', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('email', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('no_ktp', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('hp', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('asal_sekolah', 'LIKE', '%'.$this->cari_pendaftar.'%')->paginate($this->perhalaman);
        return view('livewire.admin.pendaftar')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pendaftar']);
    }

    public function exportPendaftar(){
        try {
            return response()->streamDownload(function () {
                $pendaftar = Pendaftar::where('aktif', 1)->orderBy('created_at', 'asc')->get();
                return (new FastExcel($pendaftar))->export('php://output', function ($camaba) {
                    return [
                        'Nama Lengkap' => ucwords($camaba->nama),
                        'Email' => strtolower($camaba->email),
                        'No. KTP' => $camaba->no_ktp,
                        'No. HP' => $camaba->hp,
                        'Asal Sekolah' => $camaba->asal_sekolah,
                        'Program Studi' => ucwords($camaba->nama_prodi),
                        'Waktu Pendaftaran' => $camaba->created_at->format('d-m-Y H:i'),
                        'Jumlah Pembayaran' => $camaba->invoice->total,
                        'Nomor Invoice Xendit' => $camaba->invoice->xendit_invoice_id,
                        'Chanel Pembayaran' => $camaba->invoice->channel_pembayaran,
                        'Menggunakan Voucher' => $camaba->invoice->use_voucher ? 'Ya' : 'Tidak'
                    ];
                });
            }, sprintf('calon-mahasiswa-kalla-institute-%s.xlsx', date('d-m-Y')));
        } catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}

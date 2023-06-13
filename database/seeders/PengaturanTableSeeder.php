<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$settings = [
			['web_logo' , 'tX3qOH9ZTR0RcOUD2doHQpgjWNldZJ-metaa2FsbGFfZ3JvdXAucG5n-.png'],
			['post_slug' ,	1],
			['web_title' ,	'Kalla Institute'],
			['web_description' , 'Smartpreneur Campus'],
			['status_pendaftaran' , 0],
			['web_icon' , 'mqS9mTjvNCCI3tWUxKHEQRxZmIPKGb-metaa2JzLWljb24ucG5n-.png'],
			['web_tag' , null],
			['web_keywords' , null],
			['fb_pixel' , null],
			['google_analytics' , null],
			['web_keywords' , null],
			['web_tag' , null],
			['xendit_key_public' , null],
			['xendit_key_secret' , 	'xnd_development_0GDGBB2KvbCsppN8aZu0Mj2HaZk8m21pFFvbKh5Mx9FFRHkOqmfVpDCek51eqquy'],
			['theme_color_sidebar_bg' , '#404040'],
			['theme_color_link' , '#ffffff'],
			['theme_color_link_active', '#ffffff'],
			['theme_color_link_active_bg', '#0412d7'],
			['theme_color_icon_active', '#ffffff'],
			['theme_color_link_hover', '#efff0a'],
			['theme_color_icon_hover', '#ffffff'],
			['xendit_callback_token', 'ddc8ee21298c4c5a813efae52f64b8435bdfde8d1fedcc2535985f90c2a283d3'],
			['nominal_admisi', 500000],
			['is_voucher', 0],
			['smtp_server', ''],
			['smtp_port', ''],
			['smtp_username', ''],
			['smtp_password', ''],
			['smtp_encryption', 'tls'],
			['email_pengirim', 'info@kallainstitute.ac.id'],
			['email_nama', 'Kalla Institute'],
			['pesan_admisi_non_aktif', 'Pendaftaran belum dibuka'],
			['email', 'info@kallainstitute.ac.id'],
			['no_kontak', '+(62) 811 4390 2019'],
			['facebook', 'KallaBusinessSchool'],
			['instagram', 'kallabusinesschool'],
			['twitter', 'kallabschool'],
			['youtube', 'UCieL5l-YmWlvTk3olTpgg9A'],
			['tiktok', 'ZSeGUBeem'],
			['alamat', 'Nipah Mall Office Building, Lt.5 & 6'],
			['biaya_layanan_admisi', 0],
			['mode_pembayaran', 'test'],
			['admisi_webhook_status', 0],
			['admisi_webhook_url', ''],
			['event_webhook_url', ''],
            ['visi_misi', '<h2 class="entry-title">Kalla Institute</h2><p><h4>VISI:</h4></p><p>Menjadi perguruan tinggi unggul dalam pengembangan kewirausahaan berbasis teknologi yang inovatif berlandaskan moral agama pada tahun 2034</p><p><h4>MISI:</h4></p><p><ul><li>Menyelenggarakan Pendidikan Tinggi dengan tata kelola yang baik, ditunjang Teknologi Informasi dan Sistem Manajemen Mutu</li><li>Melaksanakan Penelitian Terapan dan Pengabdian, dalam Bidang Bisnis dan Teknologi, untuk meningkatkan kesejahteraan masyarakat</li><li>Membangun sumber daya manusia yang berkarakter insan KALLA, berjiwa kepemimpinan dan kewirausahaan yang berbasis teknologi</li></ul></p>'],
			['struktur_organisasi', ''],
			['info_beasiswa', ''],
			['biaya_kuliah', ''],
			['registrasi_ulang', ''],
			['registrasi_ulang_link', ''],
			['registrasi_tutup_picture', '']
		];
		foreach($settings as $setting){
			\App\Models\Setting::create([
				'nama_setting' => $setting[0],
				'isi_setting' => $setting[1]
			]);
		}
    }
}

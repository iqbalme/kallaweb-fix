<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Category;
use App\Models\Pendaftar;
use App\Models\PesertaEvent;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Mail\registrationMail;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
	use CommonTrait;
    // public function index(){
		// $string = 'https://checkout-staging.xendit.co/';
		// if(str_contains($string, 'xendit.co')){
			// return 'benar';
		// };
		// return 'salah';
	// }

	public function index(){
		$user = User::find(3);
		$post = Post::find(12);
		$post_roles = [];
        $roles = $user->role_users;
		foreach($roles as $role){
			$post_roles[] = $role->role_id;
		}
		$prodi_id = $post->post_prodi_data->prodi_id;
		$is_true = Role::whereIn('id', $post_roles)->where('prodi_id', $prodi_id)->exists();
		return $is_true;
	}

	public function subdomain($param){
		print_r($param);
	}

	public function tesredirect(){
		//return redirect()->route('tes2', $headers = ['keyq' => 'halo']);
		//return substr(strip_tags($this->getParagraphTag($this->konten)),0,140);
		dd($this->getParagraphTag($this->removeContentTag('<p>saya adalah orang yang suka ke sekolah</p><img src="tes.jpg"><p>ini adalah sekolah saya</p>')));
	}

	public function getredirect(Request $request){
		dd(request()->headers->get('keyq'));
	}

	public function hapusfile(){
		Storage::delete('public/files/M8EiN5c9d0pQr3h1i7hBBeJnWQN1H9-metaemc3SzNDNWhrVmx5SlRzRGw1dGF4YUhJckxEZlp4RWJJUWh4YnNUbS5wZGY=-.pdf');
	}

	public function tes_email(){
		$data = [
			'email' => 'pendaftar_satu@gmail.com',
			'password' => 'JGAGEW562H4LL'
		];
		if($this->kirimEmail('webcracking@gmail.com', new registrationMail($data))){
			return 'terkirim';
		} else {
			return 'gagal';
		}
	}

	public function pendaftar(Request $request){
		//dd($request);
		Pendaftar::create($request->all());
		return 'sudah diinput';
	}

	public function update_peserta(Request $request){
		$pendaftar = PesertaEvent::find(4);
		$pendaftar->update(['no_hp' => $request->no_hp]);
		return 'sudah diupdate';
	}

    public function todo(){
        $content = "<h1>Todo:</h1>
        <p><ol>
        <li>Clone repository</li>
        <li>Buat database</li>
        <li>Setting file .env, masukkan pengaturan host server, port, nama database, username dan password database</li>
        <li>Jalankan perintah: <i>composer install</i></li>
        <li>Jalankan perintah: <i>php artisan migrate --seed</i></li>
        <li>Edit file /etc/hosts, masukkan: <i>127.0.0.1    *.kallainstitute.ac.id</i></li>
        <li>Edit DNS pada domain, masukkan A record, dengan host = * dan value = alamat_ip_server</li>
        <li>Atur setting subdomain pada file konfigurasi sesuai dengan server yang dipake, apakah nginx atau apache2</li>
        </ol>
        </p>
        <p>Jika ada perubahan atau update, maka untuk menjalankan perintah update file, bisa menggunakan perintah: <i>git push</i></p>";
        return $content;
    }
}

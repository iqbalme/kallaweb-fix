<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
use App\Http\Controllers\SubdomainController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Teslw;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\SinglePost;
use App\Http\Livewire\Frontend\Login;
use App\Http\Livewire\Frontend\Arsip;
use App\Http\Livewire\Frontend\PendaftarForm;
use App\Http\Livewire\Frontend\AdmisiNonAktif;
use App\Http\Livewire\Frontend\ShowEventList;
use App\Http\Livewire\Frontend\ShowEventSingle;
use App\Http\Livewire\Frontend\Contact;
use App\Http\Livewire\Frontend\PostArchive;
use App\Http\Livewire\Frontend\TeamList;
use App\Http\Livewire\Frontend\TeamDetail;
use App\Http\Livewire\Frontend\Fasilitas;
use App\Http\Livewire\Frontend\Pengumuman;
use App\Http\Livewire\Frontend\StrukturOrganisasi;
use App\Http\Livewire\Frontend\TentangKampus;
use App\Http\Livewire\Frontend\FaqShow;
use App\Http\Livewire\Frontend\KurikulumShow;
use App\Http\Livewire\Frontend\BiayaKuliah;
use App\Http\Livewire\Frontend\InfoBeasiswa;
use App\Http\Livewire\Frontend\RegistrasiUlang;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Profil;
use App\Http\Livewire\Admin\PendaftarCtrl;
use App\Http\Livewire\Pengaturan\PengaturanDasar;
use App\Http\Livewire\Pengaturan\PengaturanTema;
use App\Http\Livewire\Pengaturan\PengaturanMenu;
use App\Http\Livewire\Pengaturan\PengaturanAdmisi;
use App\Http\Livewire\Pengaturan\PengaturanPembayaran;
use App\Http\Livewire\Pengaturan\PengaturanMail;
use App\Http\Livewire\Pengaturan\PengaturanWebhook;
use App\Http\Livewire\Pengaturan\DatabaseIndex;
use App\Http\Livewire\User\UserIndex;
use App\Http\Livewire\Role\RoleIndex;
use App\Http\Livewire\Prodi\ProdiIndex;
use App\Http\Livewire\Kategori\KategoriIndex;
use App\Http\Livewire\Post\PostIndex;
use App\Http\Livewire\Post\PostCreate;
use App\Http\Livewire\Post\PostUpdate;
use App\Http\Livewire\Katalog\KatalogIndex;
use App\Http\Livewire\Voucher\VoucherIndex;
use App\Http\Livewire\Carousel\CarouselIndex;
use App\Http\Livewire\Page\SuccessPaymentPage;
use App\Http\Livewire\Page\ExpiredPaymentPage;
use App\Http\Livewire\Page\RegistrasiBerhasil;
use App\Http\Livewire\Menu\MenuIndex;
use App\Http\Livewire\Event\EventIndex;
use App\Http\Livewire\Facility\FacilityIndex;
use App\Http\Livewire\Team\TeamIndex;
use App\Http\Livewire\Testimoni\TestimoniIndex;
use App\Http\Livewire\Pengumuman\PengumumanIndex;
use App\Http\Livewire\Faq\FaqIndex;
use App\Http\Livewire\Kurikulum\KurikulumIndex;
use App\Http\Controllers\AdminRedirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('admin', [AdminRedirect::class, 'index']);
Route::get('todo', [TestController::class, 'todo']);
Route::get('tes1', [TestController::class, 'tesredirect']);
Route::get('tes2', [TestController::class, 'getredirect'])->name('tes2');
Route::get('tes-email', [TestController::class, 'tes_email']);
Route::get('teslw', Teslw::class);
Route::get('team/', TeamList::class)->name('team.show');
Route::get('team/{team_id}', TeamDetail::class)->name('team.detail');
Route::get('post/{post_val}', SinglePost::class)->name('post.single');
Route::get('post/', PostArchive::class)->name('post.list');
Route::get('arsip/{meta_type}/{meta_val}', Arsip::class)->name('arsip');
Route::get('event/', ShowEventList::class)->name('event.list');
Route::get('event/{event_id}/', ShowEventSingle::class)->name('event.show');
Route::get('kontak/', Contact::class)->name('kontak');
Route::get('struktur-organisasi/', StrukturOrganisasi::class)->name('struktur');
Route::get('pengumuman/', Pengumuman::class)->name('pengumuman');
Route::get('faq/', FaqShow::class)->name('faq');
Route::get('kurikulum/', KurikulumShow::class)->name('kurikulum');
Route::get('tentang-kampus/', TentangKampus::class)->name('tentang-kampus');

//route for subdomain
// Route::group(array('domain' => '{subdomain}.'.config('app.url')), function() {
//     //Place your routes in here, like for example
//     Route::get('/tes', [SubdomainController::class, 'getSubdomain']);
// });

//route for admin
Route::group(array('domain' => config('app.url')), function() {
    Route::get('fasilitas/', Fasilitas::class)->name('fasilitas.show');
    Route::get('biaya-kuliah/', BiayaKuliah::class)->name('biaya.kuliah');
	Route::get('info-beasiswa/', InfoBeasiswa::class)->name('info.beasiswa');
	Route::get('registrasi-ulang/', RegistrasiUlang::class)->name('registrasi.ulang');
    Route::get('registrasi/', PendaftarForm::class)->name('registrasi');
	Route::get('admisi-tidak-aktif/', AdmisiNonAktif::class)->name('admisi-non-aktif');
	Route::get('success-payment/', SuccessPaymentPage::class)->name('payment.success');
	Route::get('expired-payment/', ExpiredPaymentPage::class)->name('payment.expired');
	Route::get('success-registration/', RegistrasiBerhasil::class)->name('registration.success');
	Route::get('login/', Login::class)->name('login');
	Route::post('login/', [UserController::class, 'authenticate']);
    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
		Route::get('/', [AdminRedirect::class, 'index'])->name('root.admin');
		Route::get('dashboard/', Dashboard::class)->name('dashboard.admin');
		Route::get('prodi/', ProdiIndex::class)->name('prodi.index');
		Route::get('kategori/', KategoriIndex::class)->name('kategori.index');
		Route::get('register/', [UserController::class, 'register'])->name('register');
		Route::get('logout/', [UserController::class, 'logout'])->name('logout');
		Route::get('users/', UserIndex::class)->name('user.index');
		Route::get('roles/', RoleIndex::class)->name('role.index');
		Route::get('profil/', Profil::class)->name('profil');
		Route::get('post/', PostIndex::class)->name('post.index');
		Route::get('post/create/', PostCreate::class)->name('post.create');
		Route::get('post/{post}/edit', PostUpdate::class)->name('post.edit');
		Route::get('katalog/', KatalogIndex::class)->name('katalog.index');
		Route::get('voucher/', VoucherIndex::class)->name('voucher.index');
		Route::get('pengaturan/dasar/', PengaturanDasar::class)->name('pengaturan.dasar');
		Route::get('pengaturan/tema/', PengaturanTema::class)->name('pengaturan.tema');
		Route::get('pengaturan/menu/', PengaturanMenu::class)->name('pengaturan.menu');
		Route::get('pengaturan/pembayaran/', PengaturanPembayaran::class)->name('pengaturan.pembayaran');
		Route::get('pengaturan/admisi/', PengaturanAdmisi::class)->name('pengaturan.admisi');
		Route::get('pengaturan/mail/', PengaturanMail::class)->name('pengaturan.mail');
		Route::get('pengaturan/webhook/', PengaturanWebhook::class)->name('pengaturan.webhook');
		Route::get('pengaturan/database/', DatabaseIndex::class)->name('pengaturan.database');
		Route::get('carousel/', CarouselIndex::class)->name('carousel.index');
		Route::get('pendaftar/', PendaftarCtrl::class)->name('pendaftar.index');
		Route::get('menu/', MenuIndex::class)->name('pengaturan.menu');
		Route::get('event/', EventIndex::class)->name('event.index');
		Route::get('fasilitas/', FacilityIndex::class)->name('fasilitas.index');
		Route::get('tim/', TeamIndex::class)->name('team.index');
		Route::get('testimoni/', TestimoniIndex::class)->name('testimoni.index');
		Route::get('pengumuman/', PengumumanIndex::class)->name('pengumuman.index');
		Route::get('faq/', FaqIndex::class)->name('faq.index');
		Route::get('kurikulum/', KurikulumIndex::class)->name('kurikulum.index');

		//for ckeditor upload file
		Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
		Route::post('upload-thumbnail', [PostController::class, 'upload_thumbnail'])->name('thumbnail.upload');
	});
});

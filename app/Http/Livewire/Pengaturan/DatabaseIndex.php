<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Pendaftar;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Team;
use App\Http\Traits\CommonTrait;
use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\Testimoni;

class DatabaseIndex extends Component
{
    use CommonTrait;

    public function render()
    {
        return view('livewire.pengaturan.database-index')
        ->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Database']);
    }

    public function hapusDataPendaftar(){
        try{
            Pendaftar::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data pendaftar berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataUser(){
        try{
            $users = User::whereNot('id', 1)->get();
            $users->delete();
            $this->setActionNotif('Berhasil', 'Hapus data user berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataVoucher(){
        try{
            Voucher::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data voucher berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataDosen(){
        try{
            Team::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data dosen berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataKategori(){
        try{
            Category::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data kategori berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataBerita(){
        try{
            Post::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data berita berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataRole(){
        try{
            Role::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data role berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataEvent(){
        try{
            Event::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data event berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataTestimoni(){
        try{
            Testimoni::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data testimoni berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }

    public function hapusDataProdi(){
        try{
            Prodi::query()->delete();
            $this->setActionNotif('Berhasil', 'Hapus data prodi berhasil!', 'success');
        } catch(\Exception $e){
            $this->setActionNotif('Error', $e->getMessage(), 'error');
        }
    }
}

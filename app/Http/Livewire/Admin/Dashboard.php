<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostProdis;
use App\Models\Event;
use App\Models\Category;
use App\Models\Pendaftar;
use Illuminate\Http\Request;


class Dashboard extends Component
{
	public $data;

	public function mount(){
		$posts = null;
		if(Auth::user()->id == 1){
			$posts = Post::orderBy('id', 'DESC')->get();
		} else {
			$ids_post = [];
			$ids_prodi = [];
			$current_user_roles = Auth::user()->role_users;
			foreach($current_user_roles as $current_role){
				$ids_prodi[] = $current_role->roles->prodi_id;
			}
			//jika role adalah admin web utama
			if(in_array(1, $ids_prodi)){
				$posts = Post::orderBy('id', 'DESC')->get();
			} else {
				$post_ids = PostProdis::whereIn('prodi_id', $ids_prodi)->get();
				foreach($post_ids as $ids){
					$ids_post[] = $ids->post_id;
				}
				$posts = Post::orderBy('id', 'DESC')->whereIn('id', array_unique($ids_post))->get();	
			}
		}
		$this->data['posts'] = $posts;
		$this->data['events'] = Event::all();
		$this->data['categories'] = Category::all();
		$this->data['pendaftar'] = Pendaftar::all();
	}

    public function render()
    {
        return view('livewire.admin.dashboard')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Dashboard']);
    }

	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
}

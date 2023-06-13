<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Prodi;
use App\Models\PostProdis;
use App\Models\Setting;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostIndex extends Component
{
	use WithPagination;
    use AuthorizesRequests;

	public $data;
	public $isUpdate = false;
	public $isFormVisible = false;
	public $post_id = null;
	public $perhalaman = 5;
	public $cari_post = '';
	public $isPostSlug = false;
    public $initial_data_req = null;

	protected $listeners = [
		'refreshPost'
	];

	public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
		$setting_slug = Setting::where('nama_setting', 'post_slug')->first();
		if(!$setting_slug){
			$this->isPostSlug = false;
		} else {
			if((int) $setting_slug->isi_setting){
				$this->isPostSlug = true;
			} else {
				$this->isPostSlug = false;
			}
		}
	}

    public function render()
		{
			$posts = null;
			if(Auth::user()->id == 1){
				$posts = Post::orderBy('id', 'DESC')->where('judul', 'LIKE', '%'.$this->cari_post.'%')->paginate($this->perhalaman);
			} else {
				$ids_post = [];
				$ids_prodi = [];
				$current_user_roles = Auth::user()->role_users;
				foreach($current_user_roles as $current_role){
					$ids_prodi[] = $current_role->roles->prodi_id;
				}
				//jika role adalah admin web utama
				if(in_array(1, $ids_prodi)){
					$posts = Post::orderBy('id', 'DESC')->where('judul', 'LIKE', '%'.$this->cari_post.'%')->paginate($this->perhalaman);
				} else {
					$post_ids = PostProdis::whereIn('prodi_id', $ids_prodi)->get();
					foreach($post_ids as $ids){
						$ids_post[] = $ids->post_id;
					}
				$posts = Post::orderBy('id', 'DESC')->whereIn('id', array_unique($ids_post))->where('judul', 'LIKE', '%'.$this->cari_post.'%')->paginate($this->perhalaman);	
			}
        }

        //$this->authorize('view', $posts);
		$posts_categories = [];
		$posts_prodis = [];
		$posts_user = [];
		// $posts_tags = [];
		foreach($posts as $post){
			$categories = [];
            $prodis = [];
			if($post->post_categories->count()){
				foreach($post->post_categories_data as $post_category){
					$categories[] = ucwords(Category::find($post_category->category_id)->nama_kategori);
				}
			}
			$posts_categories[] = $categories;
            if($post->post_prodi->count()){
				foreach($post->post_prodi_data as $post_prodis){
                    $prodis[] = ucwords(Prodi::find($post_prodis->prodi_id)->nama_prodi);
				}
			}
			$posts_prodis[] = $prodis;
		}

		$this->data['posts'] = $posts;
		$this->data['nama_kategori'] = $posts_categories;
		$this->data['nama_prodi'] = $posts_prodis;
        return view('livewire.post.post-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Publikasi / List']);
    }

	public function setPostId($id){
		$this->post_id = $id;
	}

	public function hapusPost($id){
		Post::find($id)->delete();
	}

	public function getPost($id){
		$this->isUpdate = true; //jika ini edit, bukan tambah
		$this->isFormVisible = true;
		$post = Post::find($id);
		$this->emit('getPost', $post);
	}

}

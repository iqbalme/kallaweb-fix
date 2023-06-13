<?php

namespace App\Http\Livewire\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Prodi;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostUpdate extends Component
{
	use WithFileUploads;
	use AuthorizesRequests;
    use CommonTrait;

	public $data;
	public $isUpdate;
	public $thumbnail;
	public $first_thumbnail = true;
	public $judul;
	public $konten;
	public $categories = [];
	public $tags;
	public $prodis = [];
	public $post_id;
	public $post_prodis = [];
	public $is_headline = false;

	protected $listeners = ['setKonten'];

    protected $rules = [
        'judul' => 'required',
        // 'post_prodis' => 'required',
        'categories' => 'required',
        'thumbnail' => 'required',
        'post_id' => 'required'
    ];

	public function mount($post){
		$this->post_id = $post;
		$updatingPost = Post::find($post);
		$this->judul = $updatingPost->judul;
		$this->konten = $updatingPost->konten;
		$this->is_headline = $updatingPost->is_headline;
		if(isset($updatingPost->thumbnail)){
			$this->thumbnail = $updatingPost->thumbnail;
		} else {
			$this->first_thumbnail = false;
		}
		if($updatingPost->post_tags->count()){
			$tags = [];
			foreach($updatingPost->post_tags as $post_tag){
				$tags[] = Tag::find($post_tag->tag_id)->nama_tag;
			}
			$this->tags = implode(',',$tags);
		}
		foreach($updatingPost->post_categories as $post_category){
			$this->categories[] = $post_category->category_id;
		}
        foreach($updatingPost->post_prodi as $post_prodis){
			$this->post_prodis[] = $post_prodis->prodi_id;
		}
	}

    public function render()
    {
		$this->data['categories'] = Category::all();
		$this->data['prodis'] = $this->getAdminProdi();
        return view('livewire.post.post-update')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Publikasi / Update Post']);
    }

	public function removeThumbnail(){
		if(!$this->first_thumbnail){
			$this->thumbnail->delete();
		}
		$this->first_thumbnail = false;
		$this->thumbnail = null;
	}

	public function setKonten($value){
		$this->konten = $value;
	}

	public function updatePost($isPublished=true){
        $this->validate();
		$post_tags = [];
		$post_categories = [];
        $post_prodis = [];
		$thumbnail = null;
		if(isset($this->tags)){
			foreach(explode(',',$this->tags) as $tag){
				$post_tag = Tag::updateOrCreate(
				['nama_tag' => trim($tag)],
				['nama_tag' => trim($tag)]);
				$post_tags[] = ['tag_id' => $post_tag->id];
			}
		}
		if(isset($this->thumbnail)){
			if(!$this->first_thumbnail){
				$this->thumbnail->storeAs('public/images', $this->thumbnail->getFilename());
				$thumbnail = $this->thumbnail->getFilename();
				$this->thumbnail->delete();
			} else {
				$thumbnail = $this->thumbnail;
			}
		}
		$submittedData = [
			'judul' => $this->judul,
			'konten' => $this->konten,
			'thumbnail' => $thumbnail,
			'status_post' => ($isPublished) ? 'published' : 'draft',
			//'user_id' => Auth::user()->id,
			'is_headline' => $this->is_headline
		];
		$post = Post::find($this->post_id);
		$this->authorize('update', $post);
		$post->update($submittedData);
		if($this->is_headline) {
			Post::where('id', '!=', $this->post_id)->update(['is_headline' => false]);
		};

		$post->post_categories_data()->delete();
		if(isset($this->categories)){
			foreach($this->categories as $post_category){
				$post_categories[] = ['category_id' => $post_category];
			}
		}
        $post->post_prodi_data()->delete();
        if(count($this->data['prodis']) == 1){
			$user = Auth::user();
			if($user->id != 1){
				$post_prodis[] = ['prodi_id' => (int) $this->data['prodis'][0]['id']];
			}   
        } else {
            if(isset($this->post_prodis)){
                foreach($this->post_prodis as $post_prodi){
                    $post_prodis[] = ['prodi_id' => $post_prodi];
                }
            }
        }
		$post->post_tags_data()->delete();
		$post->post_prodi_data()->createMany($post_prodis);
		$post->post_categories_data()->createMany($post_categories);
		$post->post_tags_data()->createMany($post_tags);
		return redirect()->route('post.index');
	}
}

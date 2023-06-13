<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use App\Models\Prodi;
use App\Models\Setting;

class SinglePost2 extends Component
{
	public $post;
	public $tags;
	public $prodis;
	public $categories;
	public $author;
	public $data;
	
	public function mount($post_val){
		$post = null;
		$setting_slug = Setting::where('nama_setting', 'post_slug')->first();
		if($setting_slug){
			if($setting_slug->isi_setting){
				$post = Post::where('slug', $post_val)->first();
			} else {
				$post = Post::find($post_val);
			}
		} else {
			$post = Post::find($post_val);
		}
		$tags = [];
		$categories = [];
		$prodis = [];
		if($post->tag_id){
			$tags_id = explode(',',trim($post->tag_id));
			foreach($tags_id as $tag_id){
				$tags[] = Tag::find($tag_id);
			}
		}
		if($post->category_id){
			$categories_id = explode(',',trim($post->category_id));
			foreach($categories_id as $category_id){
				$categories[] = Category::find($category_id)->nama_kategori;
			}
		}
		if($post->prodi_id){
			$prodis_id = explode(',',trim($post->prodi_id));
			foreach($prodis_id as $prodi_id){
				$prodis[] = Prodi::find($prodi_id)->nama_prodi;
			}
		}
		$this->author = User::find($post->user_id)->nama;
		$this->post = $post;
		$this->tags = $tags;
		$this->categories = implode(',',$categories);
		$this->prodis = implode(',',$prodis);
		$this->data['prodis'] = Prodi::all();
		$this->data['categories'] = Category::all();
	}
	
    public function render()
    {
        return view('livewire.frontend.single-post2')
			->extends('layouts.app', ['title' => $this->post->judul ])
			->section('content');
    }
}

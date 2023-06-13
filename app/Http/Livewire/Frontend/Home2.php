<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\PostCategory;
use App\Models\Post;

class Home2 extends Component
{
	public $data;
	
	public function mount(){
		$postscategory = PostCategory::where('category_id', 2)->get();
		$post_ids = [];
		foreach($postscategory as $post){
			$post_ids[] = $post->post_id;
		}
		$posts = Post::whereIn('id', $post_ids)->get();
		$this->data['posts'] = $posts;
	}
	
    public function render()
    {
        return view('livewire.frontend.home2')
			->extends('layouts.app', ['title' => 'Beranda'])
			->section('content');
    }
}

<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostProdis;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class PostArchive extends Component
{
	use WithPagination;
	public $data;
    public $initial_data_req = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }

    public function render()
    {
        if($this->initial_data_req['is_main_domain']){
		    $this->data['posts'] = Post::orderByDesc('created_at')->where('status_post', 'published')->paginate(9);
        } else {
            $ids_post = [];
            $post_ids = PostProdis::where('prodi_id', $this->initial_data_req['subdomain']['id'])->get();
            foreach($post_ids as $ids){
                $ids_post[] = $ids->post_id;
            }
            $this->data['posts'] = Post::orderByDesc('created_at')->where('status_post', 'published')->whereIn('id', $ids_post)->paginate(9);
        }
        return view('livewire.frontend.post-archive')
			->extends('layouts.app', ['title' => 'List Berita'])
			->section('content');
    }
}

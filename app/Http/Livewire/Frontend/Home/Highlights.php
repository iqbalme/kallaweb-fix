<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Post;

class Highlights extends Component
{
	public $data;
	
    public function render()
    {
		$this->data['highlights'] = Post::where('status_post', 'published')->orderByDesc('created_at')->limit(5)->get();
        return view('livewire.frontend.home.highlights');
    }
}

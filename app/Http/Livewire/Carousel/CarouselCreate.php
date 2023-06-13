<?php

namespace App\Http\Livewire\Carousel;

use Livewire\Component;
use App\Models\Post;

class CarouselCreate extends Component
{
	public $messageSave = false;
	public $carousel = null;
	public $isImageInitialized = false;
	public $posts;
	public $carousel_tipe = 'post';
	
	protected $listeners = ['refreshCarouselCreate'];
	
    public function mount()
    {
        $this->posts = Post::all();
		$this->carousel['tipe'] = 'post';
    }
	
	public function render()
    {
		//$this->carousel_tipe = $this->carousel['tipe'];
        return view('livewire.carousel.carousel-create');
    }
	
	public function updatedCarouselTipe(){
		//dd('tes');
	}
	
	public function removeImage(){
		
	}
	
	public function refreshCarouselCreate(){
		
	}
}
<?php

namespace App\Http\Livewire\Carousel;

use Livewire\Component;
use App\Models\Carousel;

class CarouselIndex extends Component
{
	public $isFormVisible = false;
	public $data;
	public $cari_carousel = '';
	public $perhalaman = 5;
	public $carousel_id = null;
	public $isCarouselUpdate = false;
	
	protected $listeners = ['refreshCarousel'];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data['carousel'] = Carousel::orderBy('id', 'DESC')->where('judul', 'LIKE', '%'.$this->cari_carousel.'%')->paginate($this->perhalaman);
        return view('livewire.carousel.carousel-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Publikasi / Carousel']);
    }
	
	public function setCarouselId($carousel_id){
		$this->carousel_id = $carousel_id;
	}
	
	public function getCarousel($carousel_id){
		$this->carousel_id = $carousel_id;
	}
	
	public function hapusCarousel($carousel_id){
		
	}
	
	public function tambahCarousel(){
		
	}
	
	public function refreshCarousel(){}

}

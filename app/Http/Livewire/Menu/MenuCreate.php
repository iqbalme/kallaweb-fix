<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Prodi;
use App\Models\Katalog;

class MenuCreate extends Component
{
	protected $listeners = ['refreshMenuCreate'];
	public $link = null;
	public $nama_menu = null;
	public $tipe_menu = 'link';
	
	public function mount(){
		
	}
	
    public function render()
    {
        return view('livewire.menu.menu-create');
    }
	
	public function refreshMenuCreate(){
		
	}
	
	public function create(){
		$nama_menu = $this->nama_menu;
		$link = $this->link;
		$tempMenu = ['nama_menu' => $nama_menu, 'link' => $link, 'element_id' => uniqid()];
		$this->emit('addTempMenu', $tempMenu);
		$this->nama_menu = null;
		$this->link = null;
		$this->tipe_menu = 'link';
	}
}
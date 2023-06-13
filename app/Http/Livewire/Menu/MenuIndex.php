<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Models\Menu;

class MenuIndex extends Component
{
	protected $listeners = ['addTempMenu', 'simpanMenu'];
	
	public $tempMenu = [];
	public $menus = [];
	
	public function mount(){
		$this->menus = Menu::with('children')->where(['parent' => 'id'])->orderBy('urutan','ASC')->get()->toArray();
	}
	
    public function render()
    {
        return view('livewire.menu.menu-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Dashboard']);
    }
	
	public function addTempMenu($tempMenu){
		$this->dispatchBrowserEvent('closeModal');
		$this->dispatchBrowserEvent('addDragMenu', ['menu' => $tempMenu]);
	}
	
	public function simpanMenu($menu){
		dd($this->parseJsonArray($menu));
		// foreach($this->tempMenu as $key => $menu){
			// if($menu['element_id'] == $element_id){
				// array_splice($this->tempMenu,$key,1);
			// }
		// }
	}
	
	public function parseJsonArray($jsonArray, $parentID = 0){
		return $jsonArray;
		die;
      $return = array();
	  $i = 0;
      foreach ($jsonArray as $subArray) {
        $returnSubSubArray = array();
        if (isset($subArray['children'])) {
            $returnSubSubArray = $this->parseJsonArray($subArray['children'], $i);
        }
        $return[] = array('id' => $i, 'parentID' => $parentID);
        $return = array_merge($return, $returnSubSubArray);
		$i++;
      }
      return $return;
    }
}

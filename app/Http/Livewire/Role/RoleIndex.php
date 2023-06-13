<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use App\Models\Role;

class RoleIndex extends Component
{
	public $data;
	public $isFormVisible = false;
	public $isUpdate = false;
	public $role_id = null;
	public $role;
	
	protected $listeners = ['refreshRole'];
	
    public function render()
    {
		$this->data = Role::all();
        return view('livewire.role.role-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Role']);
    }
	
	public function setroleId($id){
		$this->role_id = $id;
	}
	
	public function getrole($id){
		$this->role = Role::find($id);
		$this->isFormVisible = true;
		$this->isUpdate = true;
	}
	
	public function hapusrole(){
		$role = Role::find($this->role_id);
		$role->delete();
		$this->refreshRole();
	}
	
	public function refreshRole(){
		$this->isFormVisible = false;
		$this->isUpdate = false;
	}
	
	public function tambahRole(){
		$this->isFormVisible = true;
		$this->isUpdate = false;
	}
}

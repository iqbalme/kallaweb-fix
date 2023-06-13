<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;

class UserIndex extends Component
{
	public $isFormVisible = false;
	public $isUpdate = false;
	public $data;
	public $user_id;
	public $user_roles_data = [];
	
	protected $listeners = [
		'refreshUser'
	];
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data = User::all();
        return view('livewire.user.user-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'User']);
    }
	
	public function tambahUser(){
		$this->isUpdate = false;
		$this->reset();
		$this->isFormVisible = true;
	}
	
	public function setUserId($id){
		$this->user_id = $id;
		$this->dispatchBrowserEvent('bukaModalUserHapus');
	}
	
	public function hapusUser(){
		$user = User::find($this->user_id);
		$user->delete();
		$this->dispatchBrowserEvent('closeModalUserHapus');
	}
	
	public function getUser($id){
		$this->isUpdate = true;
		$user = User::find($id);
		$this->emit('getUser', $user);
		$this->isFormVisible = true;
	}
	
	public function refreshUser(){
	
	}
	
	public function getUserRole($id){
		$this->user_roles_data = [];
		$role_users = RoleUser::where('user_id', $id)->get();
		foreach($role_users as $role_usr){
			$role = Role::find($role_usr->role_id);
			$this->user_roles_data[] = [$role_usr->roles->nama_role,$role->prodi->nama_prodi];
		}
		//dd($this->user_roles_data);
		$this->dispatchBrowserEvent('bukaModalRole');
	}
}

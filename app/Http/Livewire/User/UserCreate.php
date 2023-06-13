<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Role;
//use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
	use WithFileUploads;

	public $avatar = null;
	public $nama = null;
	public $email = null;
	public $password = null;
	public $roles = [];
	public $user_roles = [];
	public $is_utama = true;

    protected $rules = [
        'nama' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required',
        'user_roles' => 'required',
    ];

	public function mount(){
		$this->roles = Role::all();
	}

    public function render()
    {
        return view('livewire.user.user-create');
    }

	public function removeAvatar(){
		$this->avatar->delete();
		$this->avatar = null;
	}

	public function updatedUserRoles($value){
		if(in_array(2, $value)){
			$this->user_roles = [2];
		}
	}

	public function tambahUser(){
        $this->validate();
		$roles = [];
		foreach($this->user_roles as $role){
			$roles[] = ['role_id' => $role];
		}
		$avatar = null;
		if(isset($this->avatar)){
			$this->avatar->storeAs('public/images', $this->avatar->getFilename());
			$avatar = $this->avatar->getFilename();
			$this->avatar->delete();
		}
		$newUser = [
			'nama' => $this->nama,
			'email' => $this->email,
			'password' => bcrypt($this->password),
			'avatar' => $avatar
		];
		$user = User::create($newUser);
		$user->role_users()->createMany($roles);
        $this->reset();
		$this->emitUp('refreshUser');
	}
}

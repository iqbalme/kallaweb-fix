<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use App\Models\Prodi;
use App\Models\Role;

class RoleUpdate extends Component
{
	public $nama_role;
	public $deskripsi_role;
	public $prodis;
	public $prodi_id;
	public $role_id;

    protected $rules = [
        'role_id' => 'required',
        'nama_role' => 'required',
        'prodi_id' => 'required',
    ];

	public function mount($role){
		$this->role_id = $role->id;
		$this->nama_role = $role->nama_role;
		$this->deskripsi_role = $role->deskripsi_role;
		$prodis = Prodi::all();
		if($prodis->count()){
			$this->prodis = Prodi::all();
			$this->prodi_id = $role->prodi->id;
		};
	}

    public function render()
    {
        return view('livewire.role.role-update');
    }

	public function update(){
        $this->validate();
		$role = Role::find($this->role_id);
		$role->update(['nama_role' => $this->nama_role, 'deskripsi_role' => $this->deskripsi_role, 'prodi_id' => $this->prodi_id]);
		$this->emit('refreshRole');
	}
}

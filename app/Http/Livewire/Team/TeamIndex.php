<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use App\Models\Team;
use App\Models\Prodi;
use App\Models\TimProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamIndex extends Component
{
	public $data;
	public $team_id;
	public $team;
	public $isUpdate;
    public $team_prodis = [];
    public $single_team;
    public $initial_data_req = null;

	protected $listeners = [
		'refreshTeam'
	];

	public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
		$this->team_id = null;
		$this->team = null;
		$this->isUpdate = false;
	}

    public function render()
    {
        $teams = null;
        if(Auth::user()->id == 1){
            $teams = Team::all();
        } else {
            $ids_team = [];
            $ids_prodi = [];
            $current_user_roles = Auth::user()->role_users;
            foreach($current_user_roles as $current_role){
                $ids_prodi[] = $current_role->roles->prodi_id;
            }
            $prodi_ids = TimProdi::whereIn('prodi_id', $ids_prodi)->get();
            foreach($prodi_ids as $ids){
                $ids_team[] = $ids->team_id;
            }
            $teams = Team::whereIn('id', array_unique($ids_team))->get();
        }

        $team_prodis = [];
		$this->data['teams'] = $teams;
        foreach($teams as $team){
            $prodi_ids = [];
            foreach($team->team_prodi as $team_id){
                $prodi_ids[] = Prodi::find($team_id->prodi_id)->nama_prodi;
            }
            $team_prodis[] = $prodi_ids;
        }
        $this->single_team['team'] = $this->team;
        $this->single_team['prodi_ids'] = $this->team_prodis;
        $this->data['nama_prodi'] = $team_prodis;
		$this->emit('getTeam', $this->single_team);
        return view('livewire.team.team-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Team']);
    }

	public function refreshTeam(){
		$this->reset();
	}

	public function getTeam($id){
		$this->isUpdate = true;
		$this->team = Team::find($id);
        foreach($this->team->team_prodi as $team_prodi){
            $this->team_prodis[] = $team_prodi->prodi_id;
        }
		$this->bukaFormTeamEdit();
	}

	public function hapusTeam($id){
		$this->team_id = $id;
		$this->isUpdate = false;
		$this->bukaFormHapus();
	}

	public function hapusTeamItem(){
		Team::find($this->team_id)->delete();
		$this->closeHapusForm();
	}

	public function closeHapusForm(){
		$this->dispatchBrowserEvent('closeHapusTeam');
	}

	public function bukaFormHapus(){
		$this->dispatchBrowserEvent('bukaFormHapus');
	}

	public function bukaFormTeam(){
		$this->reset();
		$this->dispatchBrowserEvent('bukaFormTeam');
	}

	public function bukaFormTeamEdit(){
		$this->dispatchBrowserEvent('bukaFormTeamEdit');
	}

}

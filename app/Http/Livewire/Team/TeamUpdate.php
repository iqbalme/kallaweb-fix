<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Team;
use App\Http\Traits\CommonTrait;

class TeamUpdate extends Component
{
	use WithFileUploads;
    use CommonTrait;

	public $team_id = null;
	public $nama = null;
	public $deskripsi_tim = null;
	public $jabatan = null;
	public $facebook = null;
	public $instagram = null;
	public $linkedin = null;
	public $email = null;
	public $gambar = null;
	public $initGambar = true;
    public $team_prodis = [];
    public $data;

	protected $listeners = [
		'getTeam'
	];

    protected $rules = [
        'team_id' => 'required',
        'nama' => 'required',
        'deskripsi_tim' => 'required',
        'jabatan' => 'required',
        'gambar' => 'required'
    ];

    public function mount(){
        $this->data['prodis'] = $this->getAdminProdi();
    }

    public function render()
    {
        return view('livewire.team.team-update');
    }

	public function hapusGambar(){
		if(!$this->initGambar){
			$this->gambar->delete();
		}
		$this->initGambar = false;
		$this->gambar = null;
	}

	public function getTeam($team){
		$this->team_id = $team['team']['id'];
		$this->nama = $team['team']['nama'];
		$this->deskripsi_tim = $team['team']['deskripsi'];
		$this->jabatan = $team['team']['jabatan'];
		$this->gambar = $team['team']['gambar'];
        // $this->dispatchBrowserEvent('setInitialDataTim', ['deskripsi_tim' => $team['team']['deskripsi']]);
        foreach($team['prodi_ids'] as $prodi_id){
            $this->team_prodis[] = $prodi_id;
        }
		$media_sosial = unserialize($team['team']['media_sosial']);
		foreach($media_sosial as $key => $medsos){
			if($key == 'facebook'){
				$this->facebook = $medsos;
			} elseif($key == 'instagram'){
				$this->instagram = $medsos;
			} elseif($key == 'linkedin'){
				$this->linkedin = $medsos;
			} else {
				$this->email = $medsos;
			}
		}
	}

	public function update(){
        $this->validate();
		$gambar = null;
		$media_sosial = [];
        $team_prodis = [];
		if(isset($this->gambar)){
			if($this->initGambar){
				$gambar = $this->gambar;
			} else {
				$gambar = $this->gambar->getFilename();
				$this->gambar->storeAs('public/images', $gambar);
				$this->gambar = null;
			}
		}
		if(isset($this->facebook)){
			$media_sosial['facebook'] = $this->facebook;
		}
		if(isset($this->instagram)){
			$media_sosial['instagram'] = $this->instagram;
		}
		if(isset($this->linkedin)){
			$media_sosial['linkedin'] = $this->linkedin;
		}
		if(isset($this->email)){
			$media_sosial['email'] = $this->email;
		}
		$data = [
			'nama' => $this->nama,
			'deskripsi' => $this->deskripsi_tim,
			'jabatan' => $this->jabatan,
			'media_sosial' => count($media_sosial) ? serialize($media_sosial) : null,
			'gambar' => $gambar
		];
		// dd($data);
        if(count($this->data['prodis']) == 1){
            $team_prodis[] = ['prodi_id' => $this->data['prodis'][0]['id']];
        } else {
            foreach($this->team_prodis as $team_prodi){
                $team_prodis[] = ['prodi_id' => $team_prodi];
            }
        }
		$team = Team::find($this->team_id);
		$team->update($data);
        $team->team_prodi()->delete();
        $team->team_prodi()->createMany($team_prodis);
		$this->emit('refreshTeam');
		$this->resetExcept('data');
		$this->closeModal();
	}

	public function closeModal(){
		$this->dispatchBrowserEvent('closeModalTeamUpdate');
	}

	// public function updatedIsVoucher(){
	// 	if($this->vouchers){
	// 		if($this->is_voucher){
	// 			$this->voucher_id = $this->vouchers[0]->id;
	// 		} else {
	// 			$this->voucher_id = null;
	// 		}
	// 	}
	// }

	public function setTimDeskripsiUpdate($value){
		$this->deskripsi_tim = $value;
	}
}

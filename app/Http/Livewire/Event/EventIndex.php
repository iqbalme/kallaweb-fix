<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;
use App\Models\Prodi;
use App\Models\EventProdi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventIndex extends Component
{
	use WithPagination;

	public $data;
	public $event_id = null;
	public $event = null;
	public $isUpdate = false;
	public $perhalaman = 5;
	public $cari_event = '';
    public $event_prodis = [];
    public $single_event;
    public $initial_data_req = null;

	protected $listeners = [
		'refreshEvent'
	];

	public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
	}

    public function render()
    {
        $events = null;
		$event_prodis = [];
        if(Auth::user()->id == 1){
            $events = Event::orderBy('waktu_mulai', 'desc')->orderBy('waktu_berakhir', 'desc')->where('nama_event', 'LIKE', '%'.$this->cari_event.'%')->paginate($this->perhalaman);
        } else {
            $ids_event = [];
            $ids_prodi = [];
            $current_user_roles = Auth::user()->role_users;
            foreach($current_user_roles as $current_role){
                $ids_prodi[] = $current_role->roles->prodi_id;
            }
			if(in_array(1, $ids_prodi)){
				$events = Event::orderBy('waktu_mulai', 'desc')->orderBy('waktu_berakhir', 'desc')->where('nama_event', 'LIKE', '%'.$this->cari_event.'%')->paginate($this->perhalaman);
			} else {
				$prodi_evt_ids = EventProdi::whereIn('prodi_id', $ids_prodi)->get();
				foreach($prodi_evt_ids as $ids){
					$ids_event[] = $ids->event_id;
				}
				$events = Event::orderBy('waktu_mulai', 'desc')->orderBy('waktu_berakhir', 'desc')->whereIn('id', array_unique($ids_event))->where('nama_event', 'LIKE', '%'.$this->cari_event.'%')->paginate($this->perhalaman);
			}
        }
        $this->data['events'] = $events;
        foreach($events as $event){
            $prodi_ids = [];
            foreach($event->event_prodi as $prodi){
                $prodi_ids[] = Prodi::find($prodi->prodi_id)->nama_prodi;
            }
            $event_prodis[] = $prodi_ids;
        }
        $this->data['nama_prodi'] = $event_prodis;
        $this->single_event['event'] = $this->event;
        $this->single_event['prodi_ids'] = $this->event_prodis;
		$this->emit('getEvent', $this->single_event);
        return view('livewire.event.event-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Event']);
    }

	public function refreshEvent(){
		$this->reset();
	}

	public function getEvent($id){
		$this->event = Event::find($id);
        foreach($this->event->event_prodi as $event_prodi){
            $this->event_prodis[] = $event_prodi->prodi_id;
        }
		$this->isUpdate = true;
		$this->bukaFormEventEdit();
	}

	public function lihatPesertaEvent($id){
		$event = Event::find($id);
		if($event->peserta_event->count()){
			$this->bukaListPeserta($event);
		}
	}

	public function hapusEvent($id){
		$this->event_id = $id;
		$this->isUpdate = false;
	}

	public function hapusEventItem(){
		Event::find($this->event_id)->delete();
		$this->closeHapusForm();
	}

	public function closeHapusForm(){
		$this->dispatchBrowserEvent('closeHapusEvent');
	}

	public function bukaFormEvent(){
		$this->reset();
		$this->dispatchBrowserEvent('bukaFormEvent');
	}

	public function bukaFormEventEdit(){
		$this->dispatchBrowserEvent('bukaFormEventEdit');
	}

	public function bukaListPeserta($event){
		$this->dispatchBrowserEvent('bukaListPeserta', ['event' => $event]);
	}

}

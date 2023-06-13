<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\PesertaEvent;
use Livewire\WithPagination;

class PesertaEventIndex extends Component
{
	use WithPagination;

	public $data;
	public $links;
	public $listeners = ['get_peserta'];

    public function render()
    {
        return view('livewire.event.peserta-event-index');
    }

	public function get_peserta($event){
		//dd($event);
		//$datapeserta = PesertaEvent::orderBy('nama', 'asc')->where('event_id', $event['id'])->paginate(10);
		// $datapeserta = PesertaEvent::where('event_id', '=', $event['id'])->orderBy('nama', 'asc')->get();
		$datapeserta = PesertaEvent::where('event_id', '=', $event['id'])->orderBy('nama', 'asc')->get();
		// $this->links = $this->data->last()->paginate(5);
		$this->data = $datapeserta;
	}

}

<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\EventProdi;

class Events extends Component
{
    use WithPagination;

	public $data;
    public $initial_data_req = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }
	
    public function render()
    {
		if($this->initial_data_req['is_main_domain']){
            $this->data['events'] = Event::orderByDesc('id')->paginate(10);
        } else {
            $ids_event = [];
            $event_ids = EventProdi::where('prodi_id', $this->initial_data_req['subdomain']['id'])->orderByDesc('id')->get();
            foreach($event_ids as $ids){
                $ids_event[] = $ids->event_id;
            }
            // dd($ids_event);
            $this->data['events'] = Event::orderByDesc('id')->whereIn('id', $ids_event)->paginate(10);
        }
        return view('livewire.frontend.home.events');
    }
}

<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Event;
use App\Events\EventRegistered;
use App\Models\PesertaEvent;

class ShowEventSingle extends Component
{
	public $event;
	public $event_lain;
	public $pendaftar;
	
	//protected $listeners = ['closeModal'];
	
	public function mount($event_id){
		$this->event = Event::find($event_id);
		$this->event_lain = Event::whereNot('id', $event_id)->limit(3)->get();
	}
	
    public function render()
    {
        return view('livewire.frontend.show-event-single')
			->extends('layouts.app', ['title' => $this->event->nama_event])
			->section('content');
    }
	
	public function daftarEvent(){
		$peserta_event = PesertaEvent::updateOrCreate(['email' => $this->pendaftar['email']],['email' => $this->pendaftar['email'], 'nama' => $this->pendaftar['nama'], 'no_hp' => $this->pendaftar['no_hp'], 'event_id' => $this->event->id]);
		//event(new EventRegistered($this->pendaftar));
		$this->reset('pendaftar');
		$this->closeModal();
	}
	
	public function closeModal(){
		$this->dispatchBrowserEvent('closeModal');
	}
}

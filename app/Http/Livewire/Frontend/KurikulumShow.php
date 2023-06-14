<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumShow extends Component
{
	public $data;
    public $initial_data_req = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }
	
    public function render()
    {
        if($this->initial_data_req['is_main_domain']){
            $this->data['kurikulum'] = Kurikulum::orderByDesc('id')->get();
        } else {
            $ids_kurikulum = [];
            $kurikulum_ids = Kurikulum::where('prodi_id', $this->initial_data_req['subdomain']['id'])->orderByDesc('id')->get();
            foreach($kurikulum_ids as $ids){
                $ids_kurikulum[] = $ids->id;
            }
            // dd($ids_kurikulum);
            $this->data['kurikulum'] = Kurikulum::orderByDesc('id')->whereIn('id', $ids_kurikulum)->get();
        }
        return view('livewire.frontend.kurikulum-show')
			->extends('layouts.app', ['title' => 'Kurikulum'])
			->section('content');
    }
}

<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;

class PengaturanMenu extends Component
{
    public function render()
    {
        return view('livewire.pengaturan.pengaturan-menu')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Menu']);
    }
}

<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class ExpiredPaymentPage extends Component
{
    public function render()
    {
        return view('livewire.page.expired-payment-page')
			->extends('layouts.app', ['title' => 'Halaman Pembayaran Kadaluarsa'])
			->section('content');
    }
}

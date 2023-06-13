<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class SuccessPaymentPage extends Component
{
    public function render()
    {
        return view('livewire.page.success-payment-page')
			->extends('layouts.app', ['title' => 'Halaman Pembayaran Sukses'])
			->section('content');
    }
}

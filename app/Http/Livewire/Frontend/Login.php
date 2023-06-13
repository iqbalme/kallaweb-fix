<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;

class Login extends Component
{
	public $email;
	public $password;

	protected $listeners = [
		'logout'
	];

	public function mount(){
		if (Auth::check()) {
			return redirect()->route('dashboard.admin');
		}
	}

    public function render()
    {
        return view('livewire.frontend.login')
            ->layout(\App\View\Components\LoginLayout::class);;
    }

	protected $rules = [
        'email' => 'required|email',
		'password' => 'required'
    ];

	public function authenticate()
    {
        $this->validate();
        try{
            if(Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                return redirect()->route('dashboard.admin');
            } else {
                $this->addError('kesalahan', 'Email/Password salah'); //tambahkan error
            }
        } catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }
}

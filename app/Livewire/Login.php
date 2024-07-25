<?php
namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;

    public function mount()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.employee_form');
        }
    }

    public function login()
    {
        $this->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['username' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('admin/employee_form');
        } else {
            session()->flash('error', 'Invalid username or password');
        }
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
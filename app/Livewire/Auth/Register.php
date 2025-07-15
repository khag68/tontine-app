<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
     public $name, $email, $password, $password_confirmation;

    public function register()
    {
         $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'date_of_birth' => $this->date_of_birth,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        return redirect()->route($user->role === 'admin' ? 'admin.dashboard' : 'client.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    public ?User $user = null;

    public string $name  = '';
    public string $email = '';

    public function rules(): array
    {
        $emailRule = $this->user
            ? "required|email|unique:users,email,{$this->user->id}"
            : 'required|email|unique:users,email';

        return [
            'name'  => 'required|string|max:255',
            'email' => $emailRule,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email'    => 'El email no tiene un formato válido.',
            'email.unique'   => 'Este email ya está registrado.',
        ];
    }

    public function setUser(User $user): void
    {
        $this->user  = $user;
        $this->name  = $user->name;
        $this->email = $user->email;
    }

    public function resetForm(): void
    {
        $this->user  = null;
        $this->name  = '';
        $this->email = '';
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        if ($this->user) {
            $this->user->update([
                'name'  => $this->name,
                'email' => $this->email,
            ]);
        } else {
            User::create([
                'name'     => $this->name,
                'email'    => $this->email,
                'password' => Hash::make('$this->name . $this->email'),
            ]);
        }
    }
}

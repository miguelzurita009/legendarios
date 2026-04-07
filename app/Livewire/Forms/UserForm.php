<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;

class UserForm extends Form
{
    public ?User $user = null;

    public string $name             = '';
    public string $apellido_paterno = '';
    public string $apellido_materno = '';
    public string $fecha_nacimiento = '';
    public string $telefono         = '';
    public string $ci               = '';
    public string $email            = '';

    public function rules(): array
    {
        $emailRule = $this->user
            ? "required|email|unique:users,email,{$this->user->id}"
            : 'required|email|unique:users,email';

        $ciRule = $this->user
            ? "required|string|max:20|unique:users,ci,{$this->user->id}"
            : 'required|string|max:20|unique:users,ci';

        return [
            'name'             => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'required|date|before:today',
            'telefono'         => 'required|string|max:20',
            'ci'               => $ciRule,
            'email'            => $emailRule,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'             => 'El nombre es obligatorio.',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'apellido_materno.max'      => 'El apellido materno no puede tener más de 255 caracteres.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date'     => 'La fecha de nacimiento no tiene un formato válido.',
            'fecha_nacimiento.before'   => 'La fecha de nacimiento debe ser anterior a hoy.',
            'ci.required'               => 'El carnet de identidad es obligatorio.',
            'telefono.required'         => 'El teléfono es obligatorio.',
            'ci.unique'                 => 'Este carnet de identidad ya está registrado.',
            'email.required'            => 'El email es obligatorio.',
            'email.email'               => 'El email no tiene un formato válido.',
            'email.unique'              => 'Este email ya está registrado.',
        ];
    }

    public function setUser(User $user): void
    {
        $this->user             = $user;
        $this->name             = $user->name;
        $this->apellido_paterno = $user->apellido_paterno ?? '';
        $this->apellido_materno = $user->apellido_materno ?? '';
        $this->fecha_nacimiento = $user->fecha_nacimiento ?? '';
        $this->telefono         = $user->telefono ?? '';
        $this->ci               = $user->ci ?? '';
        $this->email            = $user->email;
    }

    public function resetForm(): void
    {
        $this->user             = null;
        $this->name             = '';
        $this->apellido_paterno = '';
        $this->apellido_materno = '';
        $this->fecha_nacimiento = '';
        $this->telefono         = '';
        $this->ci               = '';
        $this->email            = '';
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name'             => $this->name,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'telefono'         => $this->telefono,
            'ci'               => $this->ci,
            'email'            => $this->email,
        ];

        if ($this->user) {
            $this->user->update($data);
        } else {
            $data['password'] = strtoupper(substr($this->name, 0, 1)) . '.' . strtoupper(substr($this->apellido_paterno, 0, 1)). '.' . $this->ci;
            User::create($data);
        }
    }
}

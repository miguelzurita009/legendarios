<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public ?Role $role = null;

    public string $name = '';

    public function rules(): array
    {
        $nameRule = $this->role
            ? "required|string|max:255|unique:roles,name,{$this->role->id}"
            : 'required|string|max:255|unique:roles,name';

        return [
            'name' => $nameRule,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del rol es obligatorio.',
            'name.unique'   => 'Este rol ya existe.',
            'name.max'      => 'El nombre no puede tener más de 255 caracteres.',
        ];
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
        $this->name = $role->name;
    }

    public function resetForm(): void
    {
        $this->role = null;
        $this->name = '';
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        if ($this->role) {
            $this->role->update([
                'name' => $this->name,
            ]);
        } else {
            Role::create([
                'name'       => $this->name,
                'guard_name' => 'web',
            ]);
        }
    }
}

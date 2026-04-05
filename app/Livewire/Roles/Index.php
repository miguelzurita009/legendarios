<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use App\Livewire\Forms\RoleForm;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public RoleForm $form;
    public bool $showModal = false;

    public function openCreateModal(): void
    {
        $this->form->resetForm();
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->form->setRole(Role::findOrFail($id));
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->form->resetForm();
    }

    public function save(): void
    {
        $this->form->save();
        $this->showModal = false;
        $this->form->resetForm();
        $this->dispatch('role-saved');
    }

    public function delete(int $id): void
    {
        Role::findOrFail($id)->delete();
        $this->dispatch('role-deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.roles.index', [
            'roles' => Role::all(),
        ]);
    }
}

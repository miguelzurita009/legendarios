<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use App\Livewire\Forms\UserForm;
use Livewire\Attributes\Layout;

class Index extends Component
{
    public UserForm $form;
    public bool $showModal = false;

    public function openCreateModal(): void
    {
        $this->form->resetForm();
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->form->setUser(User::findOrFail($id));
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
        $this->dispatch('user-saved');
    }

    public function delete(int $id): void
    {
        User::findOrFail($id)->delete();
        $this->dispatch('user-deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.users.index', [
            'users' => User::all(),
        ]);
    }
}

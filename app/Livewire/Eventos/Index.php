<?php

namespace App\Livewire\Eventos;

use Livewire\Component;
use App\Models\Evento;
use App\Livewire\Forms\EventoForm;
use Livewire\Attributes\Layout;

class Index extends Component
{
    public EventoForm $form;
    public bool $showModal = false;

    public function openCreateModal(): void
    {
        $this->form->resetForm();
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->form->setEvento(Evento::findOrFail($id));
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

        $this->dispatch('evento-saved');
    }

    public function delete(int $id): void
    {
        Evento::findOrFail($id)->delete();
        $this->dispatch('evento-deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.eventos.index', [
            'eventos' => Evento::all(),
        ]);
    }
}

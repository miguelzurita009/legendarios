<?php

namespace App\Livewire\TipoAnalisis;

use Livewire\Component;
use App\Models\TipoAnalisis;
use App\Livewire\Forms\TipoAnalisisForm;
use Livewire\Attributes\Layout;

class Index extends Component
{
    public TipoAnalisisForm $form;
    public bool $showModal = false;

    public function openCreateModal(): void
    {
        $this->form->resetForm();
        $this->showModal = true;
    }

    public function openEditModal(int $id): void
    {
        $this->form->setTipo(TipoAnalisis::findOrFail($id));
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

        $this->dispatch('tipo-saved');
    }

    public function delete(int $id): void
    {
        TipoAnalisis::findOrFail($id)->delete();
        $this->dispatch('tipo-deleted');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tipo-analisis.index', [
            'tipos' => TipoAnalisis::all(),
        ]);
    }
}

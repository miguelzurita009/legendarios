<?php

namespace App\Livewire\Eventos;

use App\Models\Evento;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Show extends Component
{
    public Evento $evento;

    public function mount(Evento $evento): void
    {
        $this->evento = $evento;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.eventos.show', [
            'evento' => $this->evento,
        ]);
    }
}

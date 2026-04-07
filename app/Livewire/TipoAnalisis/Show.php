<?php

namespace App\Livewire\TipoAnalisis;

use App\Models\TipoAnalisis;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Show extends Component
{
    public TipoAnalisis $tipo;

    public function mount(TipoAnalisis $tipo): void
    {
        $this->tipo = $tipo;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.tipo-analisis.show');
    }
}

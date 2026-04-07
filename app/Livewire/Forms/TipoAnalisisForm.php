<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\TipoAnalisis;

class TipoAnalisisForm extends Form
{
    public ?TipoAnalisis $tipo = null;

    public string $nombre = '';

    public function rules(): array
    {
        $nombreRule = $this->tipo
            ? "required|string|max:255|unique:tipo_analisis,nombre,{$this->tipo->id}"
            : 'required|string|max:255|unique:tipo_analisis,nombre';

        return [
            'nombre' => $nombreRule,
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique'   => 'Este tipo de análisis ya está registrado.',
            'nombre.max'      => 'El nombre no puede tener más de 255 caracteres.',
        ];
    }

    public function setTipo(TipoAnalisis $tipo): void
    {
        $this->tipo   = $tipo;
        $this->nombre = $tipo->nombre;
    }

    public function resetForm(): void
    {
        $this->tipo   = null;
        $this->nombre = '';
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'nombre' => strtoupper($this->nombre), // 🔥 consistente con lo que ya hiciste
        ];

        if ($this->tipo) {
            $this->tipo->update($data);
        } else {
            TipoAnalisis::create($data);
        }
    }
}

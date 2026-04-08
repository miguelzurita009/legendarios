<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Evento;

class EventoForm extends Form
{
    public ?Evento $evento = null;

    public string $fecha      = '';
    public int    $capacidad  = 0;
    public string $estado     = 'activo';

    public function rules(): array
    {
        $fechaRule = $this->evento
            ? "required|date|unique:eventos,fecha,{$this->evento->id}"
            : 'required|date|unique:eventos,fecha';

        return [
            'fecha'     => $fechaRule,
            'capacidad' => 'required|integer|min:1',
            'estado'    => 'required|in:activo,finalizado',
        ];
    }

    public function messages(): array
    {
        return [
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date'     => 'La fecha no tiene un formato válido.',
            'fecha.unique'   => 'Ya existe un evento programado para esta fecha.',
            'capacidad.required' => 'La capacidad es obligatoria.',
            'capacidad.integer'  => 'La capacidad debe ser un número.',
            'capacidad.min'      => 'La capacidad debe ser al menos 1.',
            'estado.required'    => 'El estado es obligatorio.',
            'estado.in'          => 'El estado debe ser activo o finalizado.',
        ];
    }

    public function setEvento(Evento $evento): void
    {
        $this->evento    = $evento;
        $this->fecha     = $evento->fecha;
        $this->capacidad = $evento->capacidad;
        $this->estado    = $evento->estado;
    }

    public function resetForm(): void
    {
        $this->evento    = null;
        $this->fecha     = '';
        $this->capacidad = 0;
        $this->estado    = 'activo';
        $this->resetValidation();
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'fecha'     => $this->fecha,
            'capacidad' => $this->capacidad,
            'estado'    => strtoupper($this->estado),
        ];

        if ($this->evento) {
            $this->evento->update($data);
        } else {
            Evento::create($data);
        }
    }
}

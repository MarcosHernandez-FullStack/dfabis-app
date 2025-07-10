<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class Prueba extends Component
{
    public $categoria;

    public function mount()
    {
        $this->categoria = new Categoria();
    }

    protected function rules()
    {
        return [
            'categoria.descripcion' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.prueba')
            ->extends('layouts.app')
            ->section('content');
    }

    public function guardado()
    {
        dd($this->categoria);
    }
}

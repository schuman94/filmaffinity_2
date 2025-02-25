<?php

namespace App\Livewire;

use App\Models\Pelicula;
use App\Models\Ficha;
use Livewire\Component;

class PeliculaIndex extends Component
{
    public $titulo;
    public $director;
    public $fecha_estreno;
    public $peliculaid;
    public $estaEditando = false;

    public function crear()
    {
        $pelicula = Pelicula::create(
            $this->pull()
        );

        $ficha = new Ficha();
        $ficha->fichable()->associate($pelicula);
        $ficha->save();
    }

    public function editar($peliculaid)
    {
        $this->peliculaid = $peliculaid;
        $pelicula = Pelicula::findOrFail($peliculaid);
        $this->titulo = $pelicula->titulo;
        $this->director = $pelicula->director;
        $this->fecha_estreno = $pelicula->fecha_estreno;
    }

    public function actualizar()
    {
        // Hace la actualización
        $pelicula = Pelicula::findOrFail($this->peliculaid);

        $pelicula->fill(
            $this->only(['titulo', 'director', 'fecha_estreno'])
        );

        $pelicula->save();
        $this->reset();
    }

    public function cancelar()
    {
        $this->reset();
        // $this->estaEditando = false;
    }

    public function eliminar($peliculaid)
    {
        $pelicula = Pelicula::findOrFail($peliculaid);
        $pelicula->delete();
    }

    public function render()
    {
        return view('livewire.pelicula-index')->with([
            'peliculas' => Pelicula::all(),
        ]);
    }
}

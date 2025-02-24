<?php

namespace App\Livewire;

use App\Models\Pelicula;
use Livewire\Component;

class PeliculaIndex extends Component
{
    public $peliculaid;
    public $titulo;
    public $director;
    public $fecha_estreno;

    public function crear()
    {
        $pelicula = Pelicula::create(
            $this->pull()
        );

        $ficha = new Ficha();
        $ficha->pelicula()->associate($pelicula);
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

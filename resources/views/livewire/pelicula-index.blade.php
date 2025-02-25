<div x-data="{ open: false }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Peliculas
        </h2>
    </x-slot>

    <form wire:submit="{{ $estaEditando ? 'actualizar' : 'crear' }}">
        <div>
            <label for="titulo">Título: </label>
            <input wire:model="titulo" type="text" id="titulo" name="titulo">
        </div>
        <div>
            <label for="director">Director: </label>
            <input wire:model="director" type="text" id="director" name="director">
        </div>
        <div>
            <label for="fecha_estreno">Fecha de estreno: </label>
            <input wire:model="fecha_estreno" type="text" id="fecha_estreno" name="fecha_estreno">
        </div>
        <button type="submit" @click="open = ! open">{{ $estaEditando ? 'Editar' : 'Crear' }}</button>
        <button wire:click.prevent="cancelar" @click="open = ! open">Cancelar</button>
    </form>

    <div>
        <table>
            <thead>
                <th>Título</th>
                <th>Director</th>
                <th>Fecha de estreno</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->director }}</td>
                    <td>{{ $pelicula->fecha_estreno }}</td>
                    <td><a href="#" wire:confirm="¿Seguro?" wire:click="eliminar({{ $pelicula->id }})">Eliminar</a></td>
                    <td><a href="#" wire:click="editar({{ $pelicula->id }})" @click="open = ! open">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<x-app>
    <h2>Editar Deporte</h2>

    <form action="{{ route('admin.deportes.update', $deporte) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $deporte->nombre) }}">
            @error('nombre')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $deporte->descripcion) }}">
            @error('descripcion')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="cupos">Cupos:</label>
            <input type="number" name="cupos" id="cupos" value="{{ old('cupos', $deporte->cupos) }}">
            @error('cupos')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Actualizar</button>
    </form>
</x-app>

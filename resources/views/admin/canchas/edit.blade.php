<x-app>
    <h2>Editar Cancha</h2>
    
    <form action="{{ route('admin.canchas.update', $cancha) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $cancha->nombre }}">
        <input type="text" name="tipo" value="{{ $cancha->tipo }}">
        <input type="text" name="descripcion" value="{{ $cancha->descripcion }}">
        <input type="text" name="precio" value="{{ $cancha->precio }}">
        <button type="submit">Actualizar</button>
    </form>
</x-app>

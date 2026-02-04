<x-app>
    <h1>Alquileres</h1>
    
    @foreach ($canchas as $cancha)
        <p>id: {{ $cancha->id }}</p>
        <p>Nombre: {{ $cancha->nombre }}</p>
        <p>Tipo: {{ $cancha->tipo}}</p>
        <p>Descripción: {{ $cancha->descripcion}}</p>
        <p>Precio: {{ $cancha->precio }}</p>
        <a href="{{ route('reservas.show', $cancha->id) }}">Reservas</a>
    @endforeach
   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</x-app>

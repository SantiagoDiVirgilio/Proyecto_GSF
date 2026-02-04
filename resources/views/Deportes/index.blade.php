<x-app>
    <h1>Deportes</h1>
    @foreach ($deportes as $deporte)
        <p>Nombre: {{ $deporte->nombre }}</p>
        <p>Descripción: {{ $deporte->descripcion }}</p>
        <p>Vacantes: {{ $deporte->cupos }}</p>
        <p>Inscriptos: {{ $deporte->inscriptos }}</p>
        <p>Disponibles: {{ $deporte->cupos - $deporte->inscriptos }}</p>
    @endforeach
</x-app>

<x-app>
    <h1>Reservas</h1>
   @if($reservas->isEmpty())
        <p>No hay reservas vacias para esta cancha.</p>
    @else
        <p>Hay reservas para esta cancha:</p>
        @foreach ($reservas as $reserva)
            <p>Fecha: {{ $reserva->fecha }}</p>
            <p>Hora: {{ $reserva->hora }}</p>
            <p>Estado: {{ $reserva->estado }}</p>
        @endforeach
    @endif
</x-app>
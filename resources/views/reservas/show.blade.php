<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reservas</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.15/index.global.min.js'></script>
    <script src="{{ asset('js/calender.js') }}" defer></script>
</head>
<body class="bg-light">

    <div class="container mt-4">
        <div id="calendar" 
             data-cancha-id="{{ $id }}" 
             data-events-url="{{ route('reservas.events', $id) }}">
        </div>
    </div>

</body>
</html>
    
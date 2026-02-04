<x-app>
    <h4>Dashboard</h4>
    <h5>Bienvenido al Dashboard</h5>
    <p>En esta sección puedes gestionar los alquileres, los usuarios y los deportes.</p>
    <div class="row">
        <a href="{{ route('admin.canchas.index') }}">Alquileres</a>
        <a href="{{ route('admin.deportes.index') }}">Deportes</a>
    </div>
</x-app>
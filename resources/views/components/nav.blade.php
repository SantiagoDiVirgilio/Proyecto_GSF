<nav>
    <a href="{{route('home')}}">
        <img class="logo" src="{{ asset('images/logo.webp') }}" alt="Logo">
    </a>
    <ul>
        <a href="{{route('home')}}">Inicio</a>
        <a href="{{route('canchas.index')}}">Alquileres</a>
        <a href="{{route('deportes.index')}}">Deportes</a>
        <a href="{{route('mensaje.create')}}">Contacto</a>
        @auth
            <a href="{{route('perfil')}}">perfil</a>
            @if (Auth::user()->isAdmin())
                <a href="{{route('admin.dashboard')}}">Dashboard</a>
            @endif
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit">logout</button>
            </form>
        @else
            <a href="{{route('login')}}">login</a>
            <a href="{{route('register')}}">register</a>
        @endauth
    </ul>
</nav>
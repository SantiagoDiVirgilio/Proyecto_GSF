<x-app>
    <h2>Iniciar Sesión</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
        </form>
        <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
</x-app>
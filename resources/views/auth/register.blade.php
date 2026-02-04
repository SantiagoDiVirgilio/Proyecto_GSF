<x-app>
    
    <h2>Registro de Usuario</h2>
    
    <form action="{{ route('register') }}" method="POST">
        @csrf <div>
            <label>Nombre:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
            @error('password') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Registrarse</button>
    </form>
    <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>

</x-app>

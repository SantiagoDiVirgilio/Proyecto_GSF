<x-app>
    <h1>Usuarios perfil</h1>
   
        <div>
            <h3>Bienvenido, {{ auth()->user()->name }} {{ auth()->user()->apellido }}</h3>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>     
       </div>

</x-app>
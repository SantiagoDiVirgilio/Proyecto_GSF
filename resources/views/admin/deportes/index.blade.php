<x-app>
    
        <h2>Gestión de Deportes</h2>
        <a href="{{route('admin.deportes.create')}}">Agregar Deporte</a>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deportes as $deporte)
                        <tr>
                            <td>{{ $deporte->nombre }}</td>
                            <td>{{ $deporte->descripcion }}</td>
                            <td>
                                <a href="{{route('admin.deportes.edit', $deporte)}}" >Editar</a>
                                <form action="{{route('admin.deportes.destroy', $deporte)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
         
</x-app>

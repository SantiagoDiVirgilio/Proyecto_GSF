<x-app>
            <h2>Gestión de Canchas</h2>
            <a href="{{route('admin.canchas.create')}}">Agregar Cancha</a>
                <table >
                    <thead >
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($canchas as $cancha)
                        <tr>
                            <td>{{ $cancha->nombre }}</td>
                            <td>{{ $cancha->descripcion }}</td>
                            <td>
                                <a href="{{route('admin.canchas.edit', $cancha)}}" >Editar</a>
                                <form action="{{route('admin.canchas.destroy', $cancha)}}" method="POST">
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

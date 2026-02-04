<x-app>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestión de Usuarios</h2>
            <a href="#" class="btn btn-primary">Crear Usuario</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo estático, se conectará con backend luego -->
                        <tr>
                            <td>1</td>
                            <td>Usuario Demo</td>
                            <td>demo@email.com</td>
                            <td>Administrador</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>

@extends('master')
@section('titulo', 'Listado de clientes')
@section('contenido')

<br>
<div class="container">
    <p>Listado de clientes</p>
    <form method="GET" action="{{ route('clientes.index') }}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="buscarCliente" placeholder="Buscar Cliente">
            <button class="btn btn-primary" type="submit">Buscar Cliente</button>
        </div>
    </form>
    <button class="btn btn-light" id="crearClienteModalBtn">Crear Nuevo Cliente</button>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">RFC</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>
                    <a class="btn btn-warning" href="{{ route('clientes.edit', $cliente->id) }}">
                        <i class="bi bi-pencil-square edit-btn"></i>
                    </a>
                </td>
                <td>
                    {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'DELETE']) !!}
                    <button onClick="return confirm('Eliminar cliente?')" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->rfc}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$clientes->links()}}
    <hr>
</div>
<br> <br> <br>

<div class="modal" id="crearClienteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="crearClienteFormContainer">
                    <!-- Aquí se mostrará el formulario de creación -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agrega la etiqueta script para cargar jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#crearClienteModalBtn').click(function() {
            $.get("{{ route('clientes.create') }}", function(data) {
                $('#crearClienteFormContainer').html(data);
                $('#crearClienteModal').modal('show');
            });
        });

        // Evento para cerrar la ventana modal al hacer clic en el botón 'x'
        $('#cerrarModal').click(function() {
            $('#crearClienteModal').modal('hide');
        });
    });
</script>

@endsection

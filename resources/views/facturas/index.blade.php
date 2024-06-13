@extends('master')

@section('titulo', 'Listado de facturas')
@section('contenido')

    <div class="container">
      <h1>Listado de Facturas</h1>
      <form method="GET" action="{{ route('facturas.index') }}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="buscarFactura" placeholder="Buscar factura">
            <button class="btn btn-primary" type="submit">Buscar Factura</button>
        </div>
    </form>

      <button class="btn btn-light" id="crearFacturaModalBtn">Crear Nueva Factura</button>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                <th scope="col">Actualizar</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Id</th>
                <th scope="col">Numero</th>
                <th scope="col">Detalles</th>
                <th scope="col">Valor</th>
                <th scope="col">Archivo</th>
                <th scope="col">IdCliente</th>
                <th scope="col">IdForma</th>
                <th scope="col">IdEstado</th>
                </tr>
            </thead>
        <tbody>
                
            @foreach($facturas as $factura)
                <tr>
                <td>
                  <button class="btn btn-warning editarFacturaBtn" data-url="{{ route('facturas.edit', $factura->id) }}" data-toggle="modal" data-target="#editarFacturaModal">
                   <i class="fa fa-pencil-square fa-2x"></i>
                  </button>
                </td>
                    <td>
                        {!! Form::open(['route' => ['facturas.destroy', $factura->id]])  !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button onClick="return confirm('Eliminar factura?')" class="btn btn-danger">
                                <i class="fa fa-trash-o fa-2x"></i>
                                <i class="bi bi-trash"></i>
                            </button>
                        {!! Form::close() !!}
                    </td>

                    <td>{{ $factura->id}}</td>
                    <td>{{ $factura->nombre }}</td>
                    <td>{!! $factura->detalles !!}</td>
                    <td>{{ $factura->valor }}</td>
                    <td><img src="{{asset('archivos/'.$factura->archivo.'')}}" width="150"></td>
                    <td>{{ $factura->cliente->nombre }}</td>
                    <td>{{ $factura->formapago->nombre}}</td>
                    <td>{{ $factura->estadofactura->nombre }}</td>
                   
                </tr>
            @endforeach
        </tbody>
        </table>
        {{$facturas->links()}}
        <hr>
    </div>
    <br><br><br>

<div class="modal" id="crearFacturaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="crearFacturaFormContainer">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editarFacturaModal" tabindex="-1" role="dialog" aria-labelledby="editarFacturaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarFacturaModalLabel">Editar Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarModal2">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editarFacturaModalBody">
                <!-- Contenido de la vista de edición -->
            </div>
        </div>
    </div>
</div>


<!-- Agrega la etiqueta script para cargar jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#crearFacturaModalBtn').click(function() {
            $.get("{{ route('facturas.create') }}", function(data) {
                $('#crearFacturaFormContainer').html(data);
                $('#crearFacturaModal').modal('show');
            });
        });

        // Evento para cerrar la ventana modal al hacer clic en el botón 'x'
        $('#cerrarModal').click(function() {
            $('#crearFacturaModal').modal('hide');
        });

    });
</script>


<script>
$(document).ready(function() {
    // Evento para cargar la ventana modal de edición al hacer clic en el botón "Editar"
    $('.editarFacturaBtn').click(function() {
        var url = $(this).data('url');
        $.get(url, function(data) {
            $('#editarFacturaModalBody').html(data);
            $('#editarFacturaModal').modal('show');
        });
    });

            // Evento para cerrar la ventana modal al hacer clic en el botón 'x'
            $('#cerrarModal2').click(function() {
            $('#editarFacturaModal').modal('hide');
        });
});
</script>


@endsection
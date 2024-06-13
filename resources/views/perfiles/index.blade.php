@extends('master')
@section('titulo', 'Listado de perfiles')
@section('contenido')

<br>
<div class="container">
    <p>Listado de perfiles</p>
    <form method="GET" action="{{ route('perfiles.index') }}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="buscarPerfil" placeholder="Buscar Perfil">
            <button class="btn btn-primary" type="submit">Buscar Perfil</button>
        </div>
    </form>

    <button class="btn btn-light" id="crearPerfilModalBtn">Crear Nuevo Perfil</button>
    <table class="table table-sucess table-striped">
    <thead>
        <tr>
            <th scope="col">Actualizar</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
        </tr>
    </thead>

    <tbody>

    @foreach($perfiles as $perfil)
    <tr>
         <td>
        <a class="btn btn-warning" href="{{route('perfiles.edit',$perfil->id)}}">
            <i class="bi bi-pencil-square edit-btn"></i>
        </a>          
        </td>
        <td>
            {!! Form::open(['route' => ['perfiles.destroy', $perfil->id]]) !!}
            <input type="hidden" name="_method" value="DELETE">
            <button onClick="return confirm('Eliminar perfil?')" class="btn btn-danger">
                <i class="bi bi-trash"></i>
            </button>
            {!! Form::close() !!}
        </td>
        <td>{{$perfil->id}}</td>
        <td>{{$perfil->nombre}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
    {{$perfiles->links()}}
    <hr>
   </div> 
   <br><br><br>


   <div class="modal" id="crearPerfilModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="crearPerfilFormContainer">
                    <!-- Aquí se mostrará el formulario de creación -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de jQuery y Bootstrap -->
<!-- Agrega la etiqueta script para cargar jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#crearPerfilModalBtn').click(function() {
            $.get("{{ route('perfiles.create') }}", function(data) {
                $('#crearPerfilFormContainer').html(data);
                $('#crearPerfilModal').modal('show');
            });
        });

        // Evento para cerrar la ventana modal al hacer clic en el botón 'x'
        $('#cerrarModal').click(function() {
            $('#crearPerfilModal').modal('hide');
        });

    });
</script>
   @endsection
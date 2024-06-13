@extends('master')
@section('titulo', 'Listado de productos')
@section('contenido')
 
<br>
<div class="container">
    <h2>Listado de productos</h2>

    <button class="btn btn-light" id="crearProductoModalBtn">Crear Nuevo Producto</button>

    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Agregar</th>
        </tr>
    </thead>

       <tbody>
         @foreach($productos as $producto)
           <tr>
              <td>{{$producto->nombre}}</td>
              <td>${{number_format($producto->precio,0)}}</td>
              <td>{{$producto->cantidad}}</td>
              <td>
                <a href="{{ route('carrito-agregar', $producto->id)}}">
                      <i class="fa fa-shopping-cart fa-2x"></i>
                </a>
            </td>
            </tr>
        @endforeach
      </tbody>
      </table>
      {{$productos->links()}}
        <hr>
      @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
      
   </div> 
   <br>

   
   <div class="modal" id="crearProductoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrarModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="crearProductoFormContainer">
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
        $('#crearProductoModalBtn').click(function() {
            $.get("{{ route('productos.create') }}", function(data) {
                $('#crearProductoFormContainer').html(data);
                $('#crearProductoModal').modal('show');
            });
        });

        // Evento para cerrar la ventana modal al hacer clic en el botón 'x'
        $('#cerrarModal').click(function() {
            $('#crearProductoModal').modal('hide');
        });

    });
</script>

   @endsection
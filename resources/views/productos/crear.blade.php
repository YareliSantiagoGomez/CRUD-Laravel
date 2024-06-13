@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
   @endif
    {!! Form::open (['route'=> 'productos.store']) !!}
    <div class="form-group">
    {!! Form::label('nombre', 'Nombre del Cliente') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre del cliente..']) !!}
   </div>

   <div class="form-group">
    {!! Form::label('precio', 'Precio del producto') !!}
    {!! Form::number('precio', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'precio producto..']) !!}
   </div>

   <div class="form-group">
    {!! Form::label('cantidad', 'Cantidad de productos') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Cantidad..']) !!}
   </div>

    <button type="submit" class="btn btn-primary">Guardar producto</button>
        {!! Form::close() !!}
<hr>

<script>
    // Evento para manejar el envío del formulario
    $(document).ready(function() {
        $('#crearProductoForm').on('submit', function(event) {
            event.preventDefault(); // Evita que se envíe el formulario normalmente
            var formData = $(this).serialize(); // Serializa los datos del formulario
            $.post("{{ route('productos.store') }}", formData, function(response) {
                // Aquí puedes manejar la respuesta del servidor, como mostrar un mensaje de éxito o actualizar la tabla de clientes
                console.log(response);
                $('#crearProductoModal').modal('hide'); // Cierra la ventana modal después de guardar el cliente
                location.reload();
            });
        });
    });
</script>
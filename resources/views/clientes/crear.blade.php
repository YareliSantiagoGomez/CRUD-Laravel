@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['route' => 'clientes.store', 'id' => 'crearClienteForm']) !!}
<div class="form-group">
    {!! Form::label('nombre', 'Nombre del Cliente') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre del cliente..']) !!}
</div>

<div class="form-group">
    {!! Form::label('rfc', 'RFC del Cliente') !!}
    {!! Form::text('rfc', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'RFC cliente..']) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Dirección del Cliente') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Dirección cliente..']) !!}
</div>

<div class="form-group">
    {!! Form::label('telefono', 'Teléfono del Cliente') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Teléfono cliente..']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email del Cliente') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Email cliente..']) !!}
</div>

<!-- Agrega más campos aquí si es necesario -->

<button type="submit" class="btn btn-primary">Guardar cliente</button>
{!! Form::close() !!}
<hr>

<script>
    // Evento para manejar el envío del formulario
    $(document).ready(function() {
        $('#crearClienteForm').on('submit', function(event) {
            event.preventDefault(); // Evita que se envíe el formulario normalmente
            var formData = $(this).serialize(); // Serializa los datos del formulario
            $.post("{{ route('clientes.store') }}", formData, function(response) {
                // Aquí puedes manejar la respuesta del servidor, como mostrar un mensaje de éxito o actualizar la tabla de clientes
                console.log(response);
                $('#crearClienteModal').modal('hide'); // Cierra la ventana modal después de guardar el cliente
                location.reload();
            });
        });
    });
</script>
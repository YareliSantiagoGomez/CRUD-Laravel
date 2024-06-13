@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          {!! Form::open(['route'=>'facturas.store', 'enctype' => 'multipart/form-data']) !!}
            
            <div class="form-group">
                {!! Form::label('nombre', 'Número de Factura:') !!}
                {!! Form::text('nombre', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Ingrese el número de factura']) !!}
            </div>

            <div class="form-group">
                  {!! Form::label('detalles', 'Detalles de la Factura') !!}
                  <textarea name="detalles" id="editor1" cols="30" rows="10" required></textarea>
          </div> 


            <div class="form-group">
                {!! Form::label('valor', 'Valor de la Factura:') !!}
                {!! Form::number('valor', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Ingrese el valor de la factura']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('archivo', 'Archivo Adjunto:') !!}
                {!! Form::file('archivo', ['class' => 'form-control-file', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('idcliente', 'Cliente:') !!}
                {!! Form::select('idcliente', $clientes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('idforma', 'Forma de Pago:') !!}
                {!! Form::select('idforma', $formaspago, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una forma de pago']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('idestado', 'Estado de la Factura:') !!}
                {!! Form::select('idestado', $estadosfacturas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado']) !!}
            </div>

             <button type="submit" class="btn btn-primary">Guardar factura </button>
      



<script>
    // Evento para manejar el envío del formulario
    $(document).ready(function() {
        $('#crearFacturaForm').on('submit', function(event) {
            event.preventDefault(); // Evita que se envíe el formulario normalmente
            var formData = $(this).serialize(); // Serializa los datos del formulario
            $.post("{{ route('facturas.store') }}", formData, function(response) {
                // Aquí puedes manejar la respuesta del servidor, como mostrar un mensaje de éxito o actualizar la tabla de clientes
                console.log(response);
                $('#crearFacturaModal').modal('hide'); // Cierra la ventana modal después de guardar 
                location.reload();
            });
        });
    });
</script>

   <script>
                        CKEDITOR.replace( 'editor1' );
    </script>
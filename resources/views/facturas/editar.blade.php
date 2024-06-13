@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($facturas, ['route' => ['facturas.update', $facturas->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('nombre', 'Número de Factura') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Número de factura...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('detalles', 'Detalles de la Factura') !!}
        <textarea name="detalles" id="editor2" cols="30" rows="10" required>{!! $facturas->detalles !!}</textarea>
    </div>
 
    <div class="form-group">
        {!! Form::label('valor', 'Valor de la Factura') !!}
        {!! Form::number('valor', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Valor de la factura...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('archivo', 'Archivo Adjunto') !!}
        {!! Form::file('archivo', ['class' => 'form-control-file']) !!}
    </div>

    <div class="form-group">
        <label>Clientes</label>
        {!! Form::select('idcliente', $clientes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un cliente']) !!}
    </div>

    <div class="form-group">
        <label>Forma de Pago</label>
        {!! Form::select('idforma', $formaspago, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una forma de pago']) !!}
    </div>

    <div class="form-group">
        <label>Estados</label>
        {!! Form::select('idestado', $estadosfacturas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado']) !!}
    </div>

    <button type="submit" class="btn btn-primary">Actualizar factura </button>
    {!! Form::close() !!}
    <hr>
</div>

<script>
    
        CKEDITOR.replace('editor2');
</script>
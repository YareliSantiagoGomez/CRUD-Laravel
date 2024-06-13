@extends('master')
@section('titulo','Editar un Cliente')

@section('contenido')

<div class="container">
    <h1 class="text-center">Editar Cliente</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'PUT']) !!}
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

    {!! Form::submit('Guardar cliente', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <hr>
</div>
@endsection
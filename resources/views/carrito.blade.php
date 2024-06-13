@extends('master')
@section('titulo', 'Carrito')
@section('contenido')

<br>
<div class="container text-center">
    <h2>Carrito de items</h2>
    @if(count($carrito) > 0)
    <p>
            <a href="{{ route('carrito-vaciar') }}" class="btn btn-danger">Vaciar 
                carrito    <i class="fa fa-trash"></i></a>      
    </p>

    <hr>
    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Total</th>
            <th scope="col">Borrar</th>
        </tr>
    </thead>

       <tbody>
       @foreach ($carrito as $item)
           <tr>
              <td>{{$item->nombre}}</td>
              <td>${{number_format($item->precio,0)}}</td>
              <td>
                  <input type="number" min="1" value="{{$item->cantidad}}" id="producto_{{$item->id}}">
                   <a href="#" class="btn btn-warning btn-update-item" data-href="{{route('carrito-actualizar', $item->id)}}" data-id="{{$item->id}}">
                      <i class="fa fa-refresh"></i>
                   </a>
              </td>

              <td>${{$item->precio*$item->cantidad}}</td>

              <td>
                <a href="{{ route('carrito-borrar', $item->id) }}">
                  <i class="fa fa-remove fa-2x"></i>
                </a>
             </td>

            </tr>
        @endforeach
      </tbody>
      </table>
    <h3>Total: <span class="label label-success" > ${{ number_format($total)}} </span></h3>

      @else
      <h1><span class="label" style="background-color: #f0ad4e; color: #fff; padding: 5px 10px; border-radius: 4px;">No hay productos en el carrito.</span></h1>
    @endif
      <hr>

        <p>
           <a class="btn btn-info" href="{{ route('productos.index') }}">
                 <i class="fa fa-chevron-circle-left"></i> Seguir Agregando
           </a>
           @if(count($carrito))
                <a class="btn btn-success" href="{{ route('ordenar') }}">
                   Ordenar <i class="fa fa-chevron-circle-right"></i>
                 </a>
            @endif
        </p>


   </div> 
   <br><br><br><br><br><br><br><br>

   @endsection
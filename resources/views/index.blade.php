@extends('master')
@section('titulo', 'Bienvenidos Febrero-Julio 24')
@section('contenido')
@include('secciones.banner')


<div class="container text-center">
  <div class="row">
    <div class="col">
    ¿Que es Laravel?
   <br><br>
    Laravel es un framework de PHP y es utilizado para desarrollar aplicaciones web.
    PHP es el lenguaje de programación más utilizado en mundo para desarrollar sitios web, aplicaciones web y los populares CMS, como WordPress o Joomla.
    Laravel crea un entorno de trabajo y proporciona herramientas a los desarrolladores para ayudarles a desarrollar en PHP sus aplicaciones web.
   <br>
    </div>
    <div class="col">
    ¿Qué es un Framework? <br><br>
    Un framework es un entorno de trabajo, que sigue un patrón o esquema estandarizado que se utiliza para desarrollar 
    aplicaciones o cualquier tipo de software. <br>
    Los framework facilitan son un conjunto de herramientas para automatizar las tareas más comunes en la programación, 
    aumentando así la velocidad cuando se está programando y facilitando la colaboración entre desarrolladores.
    </div>
    <div class="col">
      Funciones de Laravel <br><br>
      Laravel facilita tareas que suelen ser complejas, como la autenticación, el enrutamiento y la gestión de sesiones. Al elegir Laravel, por tanto, 
      podrán beneficiarse de una comunidad activa, amplia documentación y un ecosistema robusto.
    </div>
  </div>
</div>

@endsection

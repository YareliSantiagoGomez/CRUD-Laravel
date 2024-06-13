<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="light">
  <div class="container-fluid">
   <a class="navbar-brand" href="#">
      <img src="images/img33.png" alt="Bootstrap" width="40" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
       
        @if (Auth::guest())

            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
            <li>&nbsp</li>           

            <li><a href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
                             
         @else

        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{Route('clientes.index')}}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{Route('perfiles.index')}}">Perfiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{Route('facturas.index')}}">Facturas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{Route('productos.index')}}">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('carrito')}}"> <i class="fa fa-shopping-cart fa-2x"></i> </a>
        </li>
      
      <li>
        <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                   {{ __('Cerrar sesion') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                      </form>
                </div>
         </li>
      </li>
    </ul>

      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search" data-listener-added_4de0b665="true">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
      @endif
    </div>
  </div>
</nav>
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse"
             data-target=".navbar-ex1-collapse">
       <span class="sr-only">Desplegar navegación</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
    </button>
   </div>
   
       <!-- Brand and toggle get grouped for better mobile display -->
       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav navbar-right">
           <li class="@yield('programa')"><a href="{{ asset('admin/reserva')}}"><b>Gestionar Reserva</b></a></li>
           <li class="@yield('usuario')"><a href="{{ asset('admin/user')}}"><b>Gestion de Usuario</b></a></li>
         </ul>
   
         <ul class="nav navbar-nav navbar-right">
   
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
   <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}<span class="caret"></span></a>
             <ul class="dropdown-menu">
             <li><a href="{{ asset('/')}}">Pagina Principal</a></li>
               <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Cerrar Sesion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form></li>
             </ul>
           </li>
         </ul>
       </div><!-- /.navbar-collapse -->
     <!-- /.container-fluid -->
   </nav>
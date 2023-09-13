<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  </head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Vanerb</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            @auth
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('task') }}">Todas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
              </li>

              @endauth
             
              
            </ul>
          </div>

          @guest
          <div class="float-right">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
              </li>

            

              @else
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-primary">Cerrar sesión</button>
                            
                </form>
            </ul>
          </div>

          @endguest
        </div>
      </nav>





      @yield('content')

      <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="mb-3 mb-md-0 text-muted">© 2022 Vanerb, Inc</span>
          </div>
      
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-x-twitter" style="color: #ffffff"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-instagram" style="color: #ffffff"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook" style="color: #ffffff"></i></a></li>
          </ul>
        </footer>
      </div>



</body>
</html>
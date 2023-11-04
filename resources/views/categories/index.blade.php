@extends('app')

@section('content')


@auth
<div class="container  p-4 my-4">
    <h1 class="text-white text-center">CATEGORIAS</h1>




    <div>
     

      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col" class="text-center">Categorias</th>
            <th scope="col" colspan="2"><button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#newcat">Nuevo</button></th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>
              <div style="display: flex; align-items: center;">
                <div style="background-color: {{ $category->color }}; width: 10px; height: 10px; border-radius: 50%; margin-right:5px; "></div>
              {{ $category->name }}
              </div>
              
            </td>
            
            <td><a href="{{ route('categories.show', ['category' => $category->id]) }}"><button class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></a></td>
            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></td>
          </tr>

          <div class="modal fade" id="modal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro de que quiere eliminar?</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Esta seguro de que quiere eliminar la categoria {{ $category->name }}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>

      
       
       
    </div>





    <div class="modal fade " id="newcat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel">Crear nueva categoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('categories.store') }}" method="POST">
          <div class="modal-body">
            
              @csrf
    
              @if (session('success'))
                  <h6 class="alert alert-success">{{ session('success') }}</h6>
              @endif
    
              @error('name')
              <h6 class="alert alert-danger">{{ $message }}</h6>
              @enderror
  
              @error('color')
              <h6 class="alert alert-danger">{{ $message }}</h6>
              @enderror
    
                <div class="form-group mb-3">
                  <label class="text-dark" for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" placeholder="Nombre">
                </div>
  
                <div class="form-group mb-3">
                  <label class="text-dark" for="color">Color categoria</label>
                  <input type="color" name="color" class="form-control">
                </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
          </div>
        </form>
        
        </div>
      </div>
    </div>









    
  </div>
</div>

@else
<div class="container">
  <div class="m-2">
    <div>
      <h1 class="text-center">¡Registrate!</h1>
    </div>
    <div>
      <p class="text-center">Para poder usar task manager tienes que registrarte en la app</p>
      <div class="row">
        <div class="col-md-6">
          <a href="{{ route('register') }}"><button class="btn btn-primary m-2 float-end">Registrarse</button></a>
          
         
        </div>
        <div class="col-md-6">
          <a href="{{ route('login') }}"><button class="btn btn-primary m-2">Iniciar sesión</button></a>
          
        </div>
        
       
      </div>
      
    </div>

  </div>
</div>
    @endauth
@endsection

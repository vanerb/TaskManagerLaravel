@extends('app')

@section('content')
@auth
    <div class="container  p-4 my-4">

<h1 class="text-center text-white">TAREAS</h1>





        

    </div>


    <div class="container bg-dark">
      <table class="table table-dark table-hover">
        <thead >
          <tr>
            <th class="text-center" scope="col">Tareas pendientes</th>
         
            <th scope="col" colspan="2" class="text-center"><button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#newtask">Nuevo</button></th>
           
          </tr>
        </thead>
        <tbody>
          @foreach ($tasks as $task)
          <tr>
            <td>{{ $task->title }}</td>
            <td>
              <a class="text-decoration-none text-black" href="{{ route('tasks-edit', ['id'=>$task->id]) }}">
                <button class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                
              </a></td>
            <td>

              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletetask">
                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
              </button>
             </td>
          </tr>
         @endforeach
        </tbody>
      </table>
      

<!-- Modal -->
<div class="modal fade" id="deletetask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
        ¿Está seguro de que quiere eliminar este elemento?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger">Eliminar</button>
          </form>
      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade " id="newtask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Crear nueva tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('task') }}" method="POST">
      <div class="modal-body">
        
          @csrf

          @if (session('success'))
              <h6 class="alert alert-success">{{ session('success') }}</h6>
          @endif

          @error('title')
          <h6 class="alert alert-danger">{{ $message }}</h6>
          @enderror

            <div class="form-group mb-3">
              <label class="text-dark" for="title">Titulo</label>
              <input type="text" name="title" class="form-control" placeholder="Titulo">
            </div>
            <div class="form-group mb-3">
              <label class="text-dark" for="category_id" class="form-label">Categoria de la tarea</label>
              <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Crear nueva tarea</button>
      </div>
    </form>
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
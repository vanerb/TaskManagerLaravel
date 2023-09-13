@extends('app')

@section('content')


@auth
<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form action="{{ route('categories.store') }}" method="POST">
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
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre">
              </div>

              <div class="form-group mb-3">
                <label for="color">Color categoria</label>
                <input type="color" name="color" class="form-control">
              </div>
              
              <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
            </form>
  
    </div>

    <div>
      @foreach ($categories as $category)
      <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
            <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $category->id]) }}">
                <span class="color-container" style="background-color: {{ $category->color }}"></span> {{ $category->name }}
            </a>
        </div>

        <div class="col-md-3 d-flex justify-content-end">
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}">Eliminar</button>
            
        </div>
    </div>


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

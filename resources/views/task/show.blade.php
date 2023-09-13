@extends('app')

@section('content')
@auth
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('tasks-update', ['id'=>$tasks->id]) }}" method="POST">
          @method('PATCH')
          @csrf

          @if (session('success'))
              <h6 class="alert alert-success">{{ session('success') }}</h6>
          @endif

          @error('title')
          <h6 class="alert alert-danger">{{ $message }}</h6>
          @enderror

            <div class="form-group mb-3">
              <label for="title">Titulo</label>
              <input type="text" name="title" class="form-control" placeholder="Titulo" value="{{ $tasks->title }}">
            </div>

            <div class="form-group mb-3">
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar tarea</button>
          </form>

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
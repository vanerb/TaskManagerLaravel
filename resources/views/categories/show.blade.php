@extends('app')

@section('content')


<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
            @method('PATCH')
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
                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ $category->name }}">
              </div>

              <div class="form-group mb-3">
                <label for="color">Color categoria</label>
                <input type="color" name="color" class="form-control" value="{{ $category->color }}">
              </div>
              
              <button type="submit" class="btn btn-primary">Actualizar categoria</button>
            </form>
  
    </div>
    <div >
        @if ($category->tasks->count() > 0)
            @foreach ($category->tasks as $task )
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tasks-edit', ['id' => $task->id]) }}">{{ $task->title }}</a>
                    </div>
    
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach    
        @else
            No hay tareas para esta categoría
        @endif
        
        </div>
   

</div>
    
@endsection

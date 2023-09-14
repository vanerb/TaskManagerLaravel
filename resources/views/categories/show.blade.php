@extends('app')

@section('content')


<div class="container w-25 p-4 my-4">
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

        <table class="mt-5 table table-dark table-hover">
            @foreach ($category->tasks as $task )
            <thead>
              <tr>
                
                <th scope="col">Tareas</th>
                <th colspan="2"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $task->title }}</td>
                <td> <a href="{{ route('tasks-edit', ['id' => $task->id]) }}"><button class="btn btn-info"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></a></td>
                <td> <form action="{{ route('tasks-destroy', [$task->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                </form></td>
              </tr>
              
            </tbody>
            @endforeach    
            @else
                No hay tareas para esta categoría
            @endif
          </table>
        </div>
   

</div>
    
@endsection

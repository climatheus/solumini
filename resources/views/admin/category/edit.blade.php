@extends('layouts.app')

@section('content')

    <div class="container">
    
    @if ($errors->all())
        <div class="row">
            <div class="col-md-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif

        <div class="row">
            <div class="col-md-12">
                <p class="h2">Editar Categoria</p>
            </div>

            <div class="col-md-12">
                <form action="{{ route('category.update', $category) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nome da Categoria</label>
                        <input type="text" class="form-control" placeholder="Nome da Categoria" id="name" name="name" value="{{ old('name') ? old('name') : $category->name }}">
                    </div>
                    <button class="btn btn-sm btn-success">Alterar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
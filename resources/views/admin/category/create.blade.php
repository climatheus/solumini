@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <p class="h2">Nova Categoria</p>
            </div>

            <div class="col-md-12">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="name">Nome da Categoria</label>
                        <input
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            placeholder="Nome da Categoria"
                            type="text"
                            value="{{ old('name') }}">
                    </div>

                    @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror

                    <button class="btn btn-sm btn-success">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

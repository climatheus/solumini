@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="alert alert-{{ session('status') }}">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row mt-3">
            <div class="col-md-12">
                <p class="h2">Categorias</p>
            </div>

            <div class="col-md-12 mt-3">
                <a class="btn btn-success btn-sm mb-3" href="{{ route('category.create') }}">
                    Nova Categoria
                </a>

                <div class="card mt-3 mb-3">
                    <table style="display: table" class="mb-0 card-table table table-condensed table-bordered table-sm table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="{{ route('category.show', $category) }}">
                                            {{ $category->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('category.destroy', $category) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a class="text-success btn btn-sm" href="{{ route('category.edit', $category) }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm">
                                                <i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-danger text-center text-bold">Nenhum registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection

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
                <p class="h2">Empresas</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <a class="btn btn-success btn-sm mb-3" href="{{ route('company.create') }}">
                    Nova Empresa
                </a>

                <div class="card">
                    <table style="display: table" class="mb-0 table table-hover table-condensed table-bordered table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Telefone</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>
                                        <a href="{{ route('company.show', $company) }}">
                                            {{ $company->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.show', $company->category) }}">
                                            {{ $company->category->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ !is_null($company->main_phone) 
                                        ? $company->main_phone->number
                                        : '' }}
                                    </td>
                                    <td>{{ $company->city }}</td>
                                    <td>{{ $company->state }}</td>
                                    <td>
                                        <form action="{{ route('company.destroy', $company) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('company.edit', $company) }}" class="btn btn-sm">
                                                <i class="bi bi-pencil-square text-success"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm">
                                                <i class="bi bi-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td
                                        class="text-bold text-center text-danger"
                                        colspan="6">
                                        Nenhuma empresa cadastrada
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

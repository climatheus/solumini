@extends('layouts.app')

@section('title', 'Detalhes da Categoria - SoluMini')

@section('content')
    <div class="container">

        @if ($category)
            <div class="row">
                <div class="col-md-12">
                    <p class="h2">
                        Empresas nesta categoria:
                        <strong>{{ $category->name }}</strong>.
                    </p>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                @if ($category)
                    <ul class="list-group">
                        @forelse ($category->company()->get() as $company)
                            <li class="list-group-item">
                                <a href="{{ route('company.show', $company) }}">
                                {{ $company->name }}
                                </a>
                            </li>
                        @empty
                            <li class="list-group-item text-danger text-bold">
                                Nenhuma empresa cadastrada
                            </li>
                        @endforelse
                    </ul>
                @else
                    <p class="h4 text-danger">Nenhuma empresa cadastrada</p>
                @endif
            </div>
        </div>
    </div>
@endsection

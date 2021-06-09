@extends('layouts.app')

@section('title', 'SoluMini - A cidade em mini detalhes')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">SoluMini</h1>
                    <p class="lead">A cidade em mini detalhes</p>
                </div>
            </div>
        </div>

        @if (sizeof($categories) > 0)
            <div class="row mb-5">
                <div class="col-md-12">
                    <p class="h3">
                        Categorias de empresas -
                        <span class="text-muted">
                            Encontre empresas e profissionais por categoria em Botucatu
                        </span>
                    </p>

                    <ul class="list-group list-group-flush">
                        @foreach ($categories as $category)
                            <li class="list-group-item d-flex align-items-center">
                                <a href="{{ route('front.category.show', $category) }}">
                                    {{ $category->name }}
                                </a>
                                <span class="badge badge-primary ml-2" data-toggle="tooltip" data-placement="top" title="Total de Empresas Cadastradas">
                                    {{ $category->company()->has('contract')->count() }}
                                </span>
                            </li>
                            @foreach ($companies as $company)
                                @foreach ($contracts as $contract)
                                    @if ($company->category_id == $category->id)
                                        @if ($contract->company_id == $company->id)
                                            <li class="list-group-item">
                                                <span class="ml-5">
                                                    <a href="{{ route('front.company.show', $company) }}">
                                                        {{ $company->name }}
                                                    </a>
                                                    @if ($contract->is_contract_active == 'Sim')
                                                        <i class="bi bi-info-circle text-danger" data-toggle="tooltip" data-placement="top" title="Contrato Expirado"></i>
                                                    @else
                                                        <i class="bi bi-info-circle text-success" data-toggle="tooltip" data-placement="top" title="Contrato Ativo"></i>
                                                    @endif
                                                </span>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <div class="row mt-3">
                <div class="col-md-12">
                    <p class="h3 text-danger">Nenhuma categoria ou empresa cadastrados</p>
                </div>
            </div>
        @endif

    </div>
@endsection

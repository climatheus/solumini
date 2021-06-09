@extends('layouts.app')

@section('title', 'Informações da Empresa - SoluMini')

@section('content')
    <div class="container">

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p class="h2">{{ $contract->company->name }}</p>
                <p class="h4">
                    <span class="text-muted">
                        {{ $contract->company->category->name }}
                    </span>
                </p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="h4">Dono da Empresa</p>
                                <p>{{ $contract->company_owner }}</p>
                            </div>

                            <div class="col-md-4">
                                <p class="h4">Endereço</p>
                                <p>{{ $contract->seller_name }}</p>
                            </div>

                            <div class="col-md-4">
                                <p class="h4">Contrato Válido Até</p>
                                <p>{{ $contract->expire_date->format('d/m/Y') }}</p>
                                <p>Contrato expirado: {{ $contract->is_contract_active }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Informações da Empresa - SoluMini')

@section('content')
    <div class="container">

        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p class="h2">{{ $company->name }}</p>
                <p class="h4">
                    <span class="text-muted">
                        {{ $company->category->name }}
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
                                <p class="h4">Telefones</p>
                                @forelse ($company->phone()->get() as $phone)
                                    {{ $phone->number }}<br>
                                @empty
                                    <span class="text-danger">Sem telefones</span>
                                @endforelse
                            </div>

                            <div class="col-md-4">
                                <p class="h4">Endereço</p>
                                <p>{{ $company->address }}</p>
                            </div>

                            <div class="col-md-4">
                                <p class="h4">Cidade</p>
                                <p>{{ $company->city }} - {{ $company->state }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="h4">Sobre</p>
                                <p>{{ $company->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($company->contract()->has('company')->get())
            @php
            $contract = $company->contract()->first();
            @endphp
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-0">
                                    <p class="h4 mb-3">Dados do Contrato</p>
                                    <p>Valido até:
                                        <strong>{{  $contract->expire_date->format('d/m/Y') }}</strong>
                                        @if ($contract->is_contract_active == 'Sim')
                                            <i class="bi bi-info-circle text-danger" data-toggle="tooltip" data-placement="top" title="Contrato Expirado"></i>
                                        @else
                                            <i class="bi bi-info-circle text-success" data-toggle="tooltip" data-placement="top" title="Contrato Ativo"></i>
                                        @endif
                                    </p>
                                    <p>Proprietário: <strong>{{ $contract->company_owner }}</strong></p>
                                    <p>Vendedor: <strong>{{ $contract->seller_name }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

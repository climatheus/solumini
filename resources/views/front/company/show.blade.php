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
    </div>
@endsection

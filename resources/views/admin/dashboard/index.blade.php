@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <p class="h2">Dashboard</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        <p class="card-text">Cadastro e listagem de novas categorias</p>
                        <a href="{{ route('category.index') }}" class="btn btn-primary">
                            Ir para Categorias
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Empresas</h5>
                        <p class="card-text">Cadastro e listagem de novas empresas</p>
                        <a href="{{ route('company.index') }}" class="btn btn-primary">
                            Ir para Empresas
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contratos</h5>
                        <p class="card-text">Administração dos contratos das empresas</p>
                        <a href="{{ route('contract.index') }}" class="btn btn-primary">
                            Ir para Contratos
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

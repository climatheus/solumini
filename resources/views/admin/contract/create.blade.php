@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row mt-3">
            <div class="col-md-12">
                <p class="h2">Novo Contrato</p>
            </div>
        </div>

        <form action="{{ route('contract.store') }}" method="post">

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company_owner">Dono da Empresa</label>
                        <input
                            type="text"
                            class="form-control @error('company_owner') is-invalid @enderror"
                            placeholder="Dono da Empresa"
                            id="company_owner"
                            name="company_owner"
                            value="{{ old('company_owner') }}"
                        >

                        @error('company_owner')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="seller_name">Nome do Vendedor</label>
                        <input
                            type="text"
                            class="form-control @error('seller_name') is-invalid @enderror"
                            placeholder="Nome do Vendedor"
                            id="seller_name"
                            name="seller_name"
                            value="{{ old('seller_name') }}"
                        >

                        @error('seller_name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="company_id">Empresa</label>
                        <select
                            name="company_id"
                            id="company_id"
                            class="custom-select form-control @error('company_id') is-invalid @enderror"
                        >
                            <option value="" selected>
                                Selecione uma empresa
                            </option>
                            @forelse ($companies as $company)
                                <option
                                    {{ old('company_id') == $company->id ? 'selected' : '' }}
                                    value="{{ $company->id }}">
                                    {{ $company->category->name }} - {{ $company->name }}
                                </option>
                            @empty
                                <option value="" selected>
                                    Nenhuma empresa cadastrada
                                </option>
                            @endforelse
                        </select>

                        @error('company_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expire_date">Valido Até</label>
                        <input
                            type="date"
                            class="form-control @error('expire_date') is-invalid @enderror"
                            placeholder="Válido Até"
                            id="expire_date"
                            name="expire_date"
                            value="{{ old('expire_date') }}">

                        @error('expire_date')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <button class="btn btn-sm btn-success mt-3 mb-5">Adicionar</button>
        </form>
    </div>
@endsection

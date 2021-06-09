@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <p class="h2">Nova Empresa</p>
            </div>
        </div>

        <form action="{{ route('company.update', $company) }}" method="post">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nome"
                            id="name"
                            name="name"
                            value="{{ old('name') ? old('name') : $company->name }}"
                        >

                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select
                            name="category_id"
                            id="category_id"
                            class="custom-select form-control @error('category_id') is-invalid @enderror"
                        >
                            <option value="" selected>
                                Selecione uma categoria
                            </option>

                            @forelse ($categories as $category)
                                <option
                                    {{ (old('category_id') == $category->id || $company->category->id == $category->id) ? 'selected' : '' }}
                                    value="{{ $category->id }}"
                                >
                                    {{ $category->name }}
                                </option>
                            @empty
                                <option value="">
                                    Nenhuma categoria cadastrada
                                </option>
                            @endforelse
                        </select>

                        @error('category_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input
                            type="text"
                            class="form-control @error('address') is-invalid @enderror"
                            placeholder="Endereço"
                            id="address"
                            name="address"
                            value="{{ old('address') ? old('address') : $company->address }}"
                        >

                        @error('address')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <input
                            type="text"
                            class="form-control @error('city') is-invalid @enderror"
                            placeholder="Cidade"
                            id="city"
                            name="city"
                            value="{{ old('city') ? old('city') : $company->city }}"
                        >

                        @error('city')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input
                            class="form-control @error('state') is-invalid @enderror"
                            id="state"
                            maxlength="2"
                            name="state"
                            placeholder="Estado"
                            type="text"
                            value="{{ old('state') ? old('state') : $company->state }}"
                        >

                        @error('state')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            name="description"
                            id="description"
                            cols="30"
                            rows="5"
                        >{{ old('description') ? old('description') : $company->description }}</textarea>

                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <p class="h3">
                        Telefones
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number">Telefone Principal</label>
                        <input
                            class="form-control @error('number.0') is-invalid @enderror"
                            id="number"
                            name="number[]"
                            placeholder="Telefone Principal"
                            type="text"
                            value="{{ isset($company->phone[0]->number) ? $company->phone[0]->number : old('number.0') }}"
                        >

                        @error('number.0')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number">Telefone Adicional</label>
                        <input
                            class="form-control"
                            id="number"
                            name="number[]"
                            placeholder="Telefone Adicional"
                            type="text"
                            value="{{ isset($company->phone[1]->number) ? $company->phone[1]->number : old('number.1') }}"
                        >
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number">Telefone Adicional</label>
                        <input
                            class="form-control"
                            id="number"
                            name="number[]"
                            placeholder="Telefone Adicional"
                            type="text"
                            value="{{ isset($company->phone[2]->number) ? $company->phone[2]->number : old('number.2') }}"
                        >
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="number">Telefone Adicional</label>
                        <input
                            class="form-control"
                            id="number"
                            name="number[]"
                            placeholder="Telefone Adicional"
                            type="text"
                            value="{{ isset($company->phone[3]->number) ? $company->phone[3]->number : old('number.3') }}"
                        >
                    </div>
                </div>
            </div>

            <button class="btn btn-sm btn-success mb-5">Adicionar</button>
        </form>
    </div>
@endsection

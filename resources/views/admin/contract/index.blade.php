@extends('layouts.app')

@section('title', 'Contratos - SoluMini')

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
                <p class="h2">Contratos</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <a class="btn btn-success btn-sm mb-3" href="{{ route('contract.create') }}">
                    Novo Contrato
                </a>

                <div class="card">
                    <table style="display: table" class="mb-0 table table-hover table-condensed table-bordered table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Empresa</th>
                                <th>Dono da Empresa</th>
                                <th>Vendedor</th>
                                <th>Data de Expiração</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($contracts as $contract)
                                <tr>
                                    <td>{{ $contract->id }}</td>
                                    <td>
                                        <a href="{{ route('contract.show', $contract) }}">
                                            {{ $contract->company->name }}
                                        </a>
                                    </td>
                                    <td>{{ $contract->company_owner }}</td>
                                    <td>{{ $contract->seller_name }}</td>
                                    <td>
                                        {{ $contract->expire_date->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <form action="{{ route('contract.destroy', $contract) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('contract.edit', $contract) }}" class="btn btn-sm">
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
                                        Nenhum contrato cadastrado
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $contracts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

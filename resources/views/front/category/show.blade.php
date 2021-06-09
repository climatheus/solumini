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

        @if ($category->company()->has('contract')->get())
            @php
            $contract = $category->company->contract->first();
            @endphp
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
                        @forelse ($category->company()->get() as $company)
                            <li class="list-group-item">
                                <a href="{{ route('front.company.show', $company) }}">
                                    {{ $company->name }}
                                </a>
                                @if ($contract->is_contract_active == 'Sim')
                                    <i class="bi bi-info-circle text-danger" data-toggle="tooltip" data-placement="top" title="Contrato Expirado"></i>
                                @else
                                    <i class="bi bi-info-circle text-success" data-toggle="tooltip" data-placement="top" title="Contrato Ativo"></i>
                                @endif
                            </li>
                        @empty
                            <li class="list-group-item text-danger text-bold">
                                Nenhuma empresa cadastrada
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection

<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Contract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contract.index', [
            'companies' => Company::all(),
            'contracts' => Contract::with('company')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::with('category')
            ->get()
            ->sortBy('category.name');

        return view('admin.contract.create', [
            // 'companies' => Company::with('category')->get()
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        $createdContract = Contract::create($request->all());

        if ($createdContract) {
            $request->session()->flash('status', 'success');
            $request->session()->flash(
                'message',
                "O contrato da empresa: {$createdContract->company->name} foi cadastrado"
            );
            return redirect(route('contract.index'));
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash(
            'message',
            "Erro ao cadastrar contrato da empresa: {$createdContract->company->name}"
        );
        return redirect(route('contract.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return view('admin.contract.show', [
            'contract' => $contract
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('admin.contract.edit', [
            'contract' => $contract,
            'companies' => Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        $changedContract = $contract->update($request->all());

        if ($changedContract) {
            $request->session()->flash('status', 'success');
            $request->session()->flash(
                'message',
                "O contrato da empresa: {$contract->company->name} foi alterado"
            );
            return redirect(route('contract.index'));
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash(
            'message',
            "Erro ao alterar contrato da empresa: {$contract->company->name}"
        );
        return redirect(route('contract.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        if ($contract->delete()) {
            request()->session()->flash('status', 'success');
            request()->session()->flash(
                'message',
                "O contrato com a empresa: {$contract->company->name} foi apagado"
            );
            return redirect(route('contract.index'));
        }

        request()->session()->flash('status', 'danger');
        request()->session()->flash(
            'message',
            "Erro ao apagar contrato com a empresa: {$contract->name}"
        );
        return redirect(route('contract.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Phone;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.company.index', [
            'companies' => Company::with('category')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $phones = [];

        $isMain = true;

        foreach (array_filter($request->input('number')) as $number) {
            array_push($phones, [
                'number' => $number,
                'is_main' => $isMain
            ]);

            $isMain = false;
        }

        $createdCompany = Company::create($request->all());

        $savedPhones = $createdCompany->phone()->createMany($phones);

        if ($createdCompany && $savedPhones) {
            $request->session()->flash('status', 'success');
            $request->session()->flash(
                'message',
                "A empresa: {$createdCompany->name} foi cadastrada"
            );
            return redirect(route('company.index'));
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash(
            'message',
            "Erro ao cadastrar empresa: {$createdCompany->name}"
        );
        return redirect(route('company.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.company.show', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', [
            'company' => $company,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $changedCompany = $company->update($request->all());

        $isMain = true;

        if (Phone::where('company_id', $company->id)->count() > 0) {
            $company->phone()->where('company_id', $company->id)->delete();
        }

        foreach (array_filter($request->input('number')) as $number) {
            $phone = new Phone();
            $phone->number = $number;
            $phone->company_id = $company->id;
            $phone->is_main = $isMain;
            $phone->save();
            $isMain = false;
        }

        if ($changedCompany) {
            $request->session()->flash('status', 'success');
            $request->session()->flash(
                'message',
                "A empresa: {$company->name} foi alterada"
            );
            return redirect(route('company.index'));
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash(
            'message',
            "Erro ao alterar empresa: {$company->name}"
        );
        return redirect(route('company.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->delete()) {
            request()->session()->flash('status', 'success');
            request()->session()->flash(
                'message',
                "A empresa: {$company->name} foi apagada"
            );
            return redirect(route('company.index'));
        }

        request()->session()->flash('status', 'danger');
        request()->session()->flash(
            'message',
            "Erro ao apagar empresa: {$company->name}"
        );
        return redirect(route('company.index'));
    }
}

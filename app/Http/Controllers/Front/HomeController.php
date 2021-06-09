<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Company;
use App\Contract;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('company')
            ->orderBy('name')
            ->get();

        $companies = Company::with('category', 'contract')->get();

        $contracts = Contract::with('company')->get();

        return view('front.index', [
            'categories'    => $categories,
            'companies'     => $companies,
            'contracts'     => $contracts,
        ]);
    }

    public function showCategory(Category $category)
    {
        return view('front.category.show', [
            'category' => $category
        ]);
    }

    public function showCompany(Company $company)
    {
        return view('front.company.show', [
            'company' => $company
        ]);
    }
}

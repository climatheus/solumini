<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $createdCategory = Category::create($request->only('name'));

        if ($createdCategory) {
            $request->session()->flash('status', 'success');
            $request->session()->flash(
                'message',
                "A categoria: {$createdCategory->name} foi cadastrada"
            );
            return redirect(route('category.index'));
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash(
            'message',
            "Erro ao cadastrar categoria: {$createdCategory->name}"
        );
        return redirect(route('category.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->input('name');
        if ($category->save()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash(
                'message',
                "A categoria: {$category->name} foi alterada"
            );
            return redirect(route('category.index'));
        }

        $request->session()->flash('status', 'danger');
        $request->session()->flash(
            'message',
            "Erro ao alterar categoria: {$category->name}"
        );
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            request()->session()->flash('status', 'success');
            request()->session()->flash(
                'message',
                "A categoria: {$category->name} foi apagada"
            );
            return redirect(route('category.index'));
        }

        request()->session()->flash('status', 'danger');
        request()->session()->flash(
            'message',
            "Erro ao apagar categoria: {$category->name}"
        );
        return redirect(route('category.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subCategorias = SubCategoria::latest('id')->paginate(8);

        return view('admin.sub-categorias.index', compact('subCategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all()->pluck('name','id');

        return view('admin.sub-categorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([

            'name' => 'required',
            'slug' => 'required|unique:sub_categorias,slug',
            'categoria' => 'required'
        ]);
        
        $subcategoria = new SubCategoria();

        $subcategoria->name = $request->name;
        $subcategoria->user_id = auth()->user()->id;
        $subcategoria->slug = $request->slug;
        $subcategoria->categoria_id = $request->categoria;
        $subcategoria->save();
        
       return redirect()->route('admin.sub-categorias.edit', $subcategoria)->with('alert', "La sub-categoria: $subcategoria->name  fue crearda con exito");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategoria $subcategoria)
    {
        //
        $categorias = Categoria::all()->pluck('name','id');
       

        return view('admin.sub-categorias.edit', compact('categorias','subcategoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategoria $subcategoria)
    {
        //
        $subcategoria->update($request->all());

        $subcategoria->user_id = auth()->user()->id;

        $subcategoria->save();

        return redirect()->route('admin.sub-categorias.edit', $subcategoria)->with('alert', "La sub-categoria: $subcategoria->name  fue actulizada con exito");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategoria $subcategoria)
    {
        //
        $subcategoria->delete();

        return redirect()->route('admin.sub-categorias.index', $subcategoria)->with('alert', "La sub-categoria: $subcategoria->name  fue eliminada con exito");
    }
}

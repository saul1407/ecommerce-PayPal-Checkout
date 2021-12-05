<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

     public function __construct()
     {
        
     }
    public function index()
    {
        //
        $categorias = Categoria::latest('id')->paginate(8);
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categorias.create');
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
             'slug' => 'required|unique:categorias'

        ]);

        $categoria = new Categoria();
        $categoria->name = $request->name;
        $categoria->user_id = auth()->user()->id;
        $categoria->slug = $request->slug;
        $categoria->save();

        return redirect()->route('admin.categorias.index', $categoria)->with('info', 'La Categoria: ' .$categoria->name.' fue creada con exito');
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
    public function edit(Categoria $categoria)
    {
        //
       

        return view('admin.categorias.edit', compact('categoria'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        $request->validate([

            'name' => 'required',
             'slug' => "required|unique:categorias,slug,$categoria->id"

        ]);

        $categoria->update($request->all());

        return redirect()->route('admin.categorias.edit', $categoria)->with('info', 'La Categoria: ' .$categoria->name.' fue actulizar con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
        $categoria->delete();

        

        return redirect()->route('admin.categorias.index')->with('info', 'La Categoria: ' .$categoria->name.' fue eliminadar con exito');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideojuegosController extends Controller
{

    public function postJuego()
    {
        return "Respuesta form";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //PARA USAR EL MODELO  DE VIDEOJUEGO EN EL CONTROLADOR
        $videojuegos = Videojuego::all();



        $mensjae = "Mensjae juegos";

        return view('juegos/index', [
            'videojuegos' => $videojuegos,
            "mensaje" => $mensjae
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('juegos/create');
    }

    /**
     * Donde almacenamos datos del fomrulario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recuperamos los datos del formulario (createblade)
        $videojuego = new Videojuego;
        $videojuego->titulo = $request->input('titulo');
        $videojuego->precio = $request->input('precio');
        $videojuego->pegi = $request->input('pegi');
        $videojuego->descripcion = $request->input('descripcion');
        $videojuego->compania_id = $request->input('id_compania');
        $videojuego->save();

        return redirect('/juegos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //recogemos el id del videojuego marcado
        $videojuego = Videojuego::find($id);
        return view('juegos/show', [
            'videojuego' => $videojuego
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videojuego = Videojuego::find($id);

        return view('juegos/edit', [
            'videojuego' => $videojuego
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $videojuego = Videojuego::find($id);

        $videojuego->titulo = $request->input('titulo');
        $videojuego->precio = $request->input('precio');
        $videojuego->pegi = $request->input('pegi');
        $videojuego->descripcion = $request->input('descripcion');
        $videojuego->save();

        return redirect('/juegos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('videojuegos')->where('id', "=", $id)->delete();

        return redirect('/juegos');
    }

    /**
     * Busca todos los videojuegos que contengan la palabra introducida en el buscador
     * 
     * @param String $titulo
     */
    public function search(Request $request)
    {
        $titulo = $request->input('buscador');
        $videojuegos = DB::table('videojuegos')
            ->where('titulo', 'like', '%' . $titulo . '%')
            ->get();

        return view('juegos/search', [
            'videojuegos' => $videojuegos
        ]);
    }
}

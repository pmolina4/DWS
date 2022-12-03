<?php

namespace App\Http\Controllers;

use App\Models\Compania;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //PARA USAR EL MODELO  DE VIDEOJUEGO EN EL CONTROLADOR
        $companias = Compania::all();



        //Le paso a la vista index el resultado de el select de la bd de compania
        return view('companias/index', [
            'companias' => $companias
        ]);

        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companias/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Recuperamos los datos del formulario (createblade)
         $compania = new Compania;//new es el nombre de el modelo 
         $compania -> nombre = $request -> input('nombre');
         $compania -> sede = $request -> input('sede');
         $compania -> fecha_fundacion = $request -> input('fecha');
         $compania -> save();
 
         return redirect('/companias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Busco por el id y me voy a la vista de show pasandole el objeto en concreto
        $compania = Compania::find($id);
        return view('companias/show',[
            'compania' => $compania
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
        $compania = Compania::find($id);

        return view('companias/edit', [
            'compania' => $compania
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
        $compania = Compania::find($id);

        $compania->nombre = $request->input('nombre');
        $compania->sede = $request->input('sede');
        $compania->fecha_fundacion = $request->input('fecha');

        $compania->save();

        return redirect('/companias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('companias')-> where ('id',"=",$id)->delete();
        return redirect('/companias');
    }
}   

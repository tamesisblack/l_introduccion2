<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Banco::all();
        $setQuery = collect($query);
        $resultado = $setQuery->filter(function($item,$key){
            return $item->siglas == null;
        })->values();

        //solo obtener los nombres en un array
        $getOnlyNombres = $resultado->pluck('nombre');
        return $getOnlyNombres;
        // return $query;
        // $coleccion = collect([
        //     "edad" => "15",
        //     "nombre" => "juan",
            
        // ]);
        // $resultado = $coleccion->map(function($item, $key){
        //     if($key == "nombre"){ return $item . " - " . "hola mundo"; }
        //     return $item;
        // });
         return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->id > 0){ $banco = Banco::find($request->id); }
        else                { $banco = new Banco(); }
        $banco->fill($request->all());
        $banco->save();
        return $banco;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

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

        $collection1 = collect([
            (object) ['id' => 1, 'name' => 'Object A'],
            (object) ['id' => 2, 'name' => 'Object B'],
            (object) ['id' => 3, 'name' => 'Object C'],
        ]);
        
        $collection2 = collect([
            (object) ['id' => 1, 'name' => 'Object e'],
            (object) ['id' => 2, 'name' => 'Object B'],
            (object) ['id' => 4, 'name' => 'Object D'],
        ]);
        
        // Convertir cada objeto a su ID para la comparación
        $ids1 = $collection1->pluck('id');
        $ids2 = $collection2->pluck('id');
        
        $difference = $ids1->diff($ids2);
        // Filtrar la colección original para obtener solo los objetos cuyos IDs están en la diferencia
        $differentObjects = $collection1->filter(function ($item) use ($difference) {
            return $difference->contains($item->id);
        });
        
        // Mostrar los objetos diferentes
        foreach ($differentObjects as $obj) {
            echo "ID: {$obj->id}, Name: {$obj->name}\n";
        }
             ///COMBINAR
            //  $keys = collect(['nombre', 'edad']);
            //  $values = collect(['Alice', 25]);
     
            //  $combined = $keys->combine($values);
            //  return $combined;
        // $query = Banco::all();
        // $collection = collect($query);

        // Dividir la colección en trozos de tamaño 4
        // $chunks = $collection->chunk(4)->flatten();;

        // return $chunks->all();
        // $query = Banco::all();
        // $setQuery = collect($query);
        // $resultado = $setQuery->filter(function($item,$key){
        //     return $item->siglas == null;
        // })->values();

        // //solo obtener los nombres en un array
        // $getOnlyNombres = $resultado->pluck('nombre');
        // return $getOnlyNombres;
        // return $query;

        //map
        // $coleccion = collect([
        //     "edad" => "15",
        //     "nombre" => "juan",
            
        // ]);
        // $resultado = $coleccion->map(function($item, $key){
        //     if($key == "nombre"){ return $item . " - " . "hola mundo"; }
        //     return $item;
        // });
        // return $resultado;

 
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

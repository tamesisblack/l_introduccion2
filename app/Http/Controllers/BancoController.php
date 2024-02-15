<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class Usuarios {
    public $name;
    public $email;
    public $edad;
    public function __construct($datos) {
        $this->name = $datos['name'];
        $this->email = $datos['email'];
        $this->edad = $datos['edad'];
    }
    public function mostrarNombre(){
        return $this->name;
    }
    public function saludar(){
        return "Hola, mi nombre es " . $this->name;
    
    }
}
class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
/////////////////////////SILENCIAR EVENTOS
        Banco::withoutEvents(function () {
            Banco::create([
                'nombre' => 'Banco 1',
                'siglas' => 'B1'
            ]);
        });

        //BUSCAR SI NO EXISTE EL BANCO
        $query = Banco::Where('nombre','Goku')
        ->firstOr(function(){
            //si no existe lo creo
            return Banco::create([
                'nombre' => 'Goku',
                'siglas' => 'GK'
            ]);
        });
        return $query;

        //AGRUPA POR CATEGORIAS
        // $collection = collect([
        //     ['category' => 'Fruits', 'name' => 'Apple'],
        //     ['category' => 'Fruits', 'name' => 'Banana'],
        //     ['category' => 'Vegetables', 'name' => 'Carrot']
        // ]);
        
        // $grouped = $collection->mapToDictionary(function ($item) {
        //     return [$item['category'] => $item['name']];
        // });
        // return $grouped->all();


        // $usersData = collect([
        //     ['name' => 'Alice', 'email' => 'alice@example.com',"edad" => 15],
        //     ['name' => 'Bob', 'email' => 'bob@example.com', "edad" => 20],
           
        // ]);
    
        // $users = $usersData->mapInto(Usuarios::class);
        // $users->each(function ($propiedad) {
        //     echo $propiedad->saludar();
        //     echo "<br>";
        // });



        // $collection = collect([
        //     ['id' => 1, 'name' => 'Producto A', 'price' => 100],
        //     ['id' => 2, 'name' => 'Producto B', 'price' => 150],
        // ]);
        
        // $newCollection = $collection->mapWithKeys(function ($item) {
        //     return [
        //         $item['id'] => 
        //         [
        //             'nombre' => $item['name'], 
        //             'precio' => $item['price']
        //         ]
        //     ];
        // })->values();
        // return $newCollection;

        // $usuarios = collect([
        //     ['id' => 1, 'nombre' => 'Juan Pérez', 'email' => 'juan@example.com'],
        //     ['id' => 2, 'nombre' => 'Ana Gómez', 'email' => 'ana@example.com'],
        //     ['id' => 3, 'nombre' => 'Luis Martínez', 'email' => 'luis@example.com'],
        // ]);
        // $usuariosTransformados = $usuarios->mapWithKeys(function ($usuario) {
        //     return [$usuario['id'] => "{$usuario['nombre']} - {$usuario['email']}"];
        // });
        // return $usuariosTransformados;
        // $query = Banco::all()->each(function($item,$key){
        //     if($item->siglas === null){
        //         $item->siglas = "N/A";
        //     }
        // })
        // ->filter(function($item,$key){
        //     return $item->id > 5;
        // });
        // return $query;


        // $query = Banco::all()->each(function ($item, $key) {
        //     if ($item->siglas === null) {
        //         $item->siglas = "N/A";
        //     }
        // })->filter(function ($item, $key) {
        //     return $item->id > 1;
        // })->values();



        // $users = [
        //     (object) ['name' => 'Alice', 'email' => 'alice@example.com'],
        //     (object) ['name' => 'Bob', 'email' => 'bob@example.com'],
        //     (object) ['name' => 'Charlie', 'email' => 'charlie@example.com'],
        // ];
        // $usersCollection = collect($users);

        // $resultado = $usersCollection->map(function($item,$key){
        //     return $item->name;
        // });
        // return $resultado;
        // $collection = collect([1, 2, 3, 4, 5]);
        
        // $result = $collection->tap(function ($collection) {
        //     // Asegúrate de pasar un array como segundo argumento a Log::info
        //     Log::info('Valor máximo antes de duplicar:', ['max' => $collection->max()]);
        // })
        // ->map(function ($value) {
        //     // Duplicar cada elemento de la colección.
        //     return $value * 2;
        // })
        // ->tap(function ($collection) {
        //     // De nuevo, asegúrate de pasar un array como segundo argumento a Log::info
        //     Log::info('Valor máximo después de duplicar:', ['max' => $collection->max()]);
        // })
        // ->filter(function ($value) {
        //     // Filtrar la colección para conservar solo los valores mayores que 5.
        //     return $value > 5;
        // });
        // return $result->all();
        // $result contiene los valores [6, 8, 10], después de duplicar y filtrar.
        
        
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

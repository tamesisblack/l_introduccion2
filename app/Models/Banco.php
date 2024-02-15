<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Banco extends Model
{
    use HasFactory;
    
    protected $table = 'bancos';
    //masivo a todo
    protected $guarded = [];
    // protected $fillable = ["nombre","siglas"];
    public function hola() {

        return $this->primaryKey;
    }
    protected static function boot()
    {
        parent::boot();
        //Se ejecuta despues del select
        static::retrieved(function ($user) {
            // Lógica a ejecutar después de recuperar el modelo
            // Por ejemplo, ajustar el formato de la fecha de nacimiento
            // $user->birthdate = $user->birthdate->format('d/m/Y');
        });
        //antes que se cree un nuevo banco
        static::creating(function ($banco) {
            $banco->nombre = strtoupper($banco->nombre);
        });
        //cuando se haya creado
        static::created(function($banco){
            Log::info("Se ha creado el banco con id: " . $banco->id);
        });
        //antes que se vaya a actualizar
        static::updating(function($banco){
            $banco->siglas = strtoupper($banco->siglas);
        });
        //despues que se actualizo
        static::updated(function ($banco) {
            Log::info("Se ha actualizado el banco con id: " . $banco->id);
        });
        static::deleting(function ($post) {
            // Lógica antes de la eliminación
            // Por ejemplo, eliminar relaciones o recursos asociados
        });

        static::deleted(function ($post) {
            // Lógica después de la eliminación
            // Por ejemplo, registrar la acción o limpiar cachés
        });
    }
}

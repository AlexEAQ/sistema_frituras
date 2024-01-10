<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cajas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_caja', 'nombre', 'estado', 'user_id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

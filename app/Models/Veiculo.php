<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'placa', 'cor', 'ano', 'modelo', 'capacidade'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

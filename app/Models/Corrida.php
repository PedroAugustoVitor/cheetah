<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corrida extends Model
{
    protected $fillable = [
        'origem', 'destino', 'data', 'hora', 'volume', 'peso', 'fragil', 'tempo', 'distancia', 'valor', 'motorista_id'
    ];
    
    public function passageiro()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function motorista()
    {
        return $this->belongsTo('App\Models\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dataNascimento', 'cpf', 'cep', 'telefone', 'celular', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function veiculos()
    {
        return $this->hasMany('App\Models\Veiculo');
    }
    
    public function entregas()
    {
        return $this->hasMany('App\Models\Corrida', 'motorista_id');
    }
    
    public function corridas()
    {
        return $this->hasMany('App\Models\Corrida', 'passageiro_id');
    }
}

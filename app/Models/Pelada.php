<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelada extends Model
{
    protected $table = 'peladas';
    protected $fillable = ['nome', 'data', 'horario', 'local'];


    /**
     * Get Jogadores
     */
    public function jogadores(){
        return $this->belongsToMany(Jogador::class);
    }
}

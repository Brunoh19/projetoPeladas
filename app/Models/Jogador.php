<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';
    protected $fillable = ['nome', 'apelido', 'email', 'senha'];


    /**
     * Get Peladas
     */
    public function peladas(){
        return $this->belongsToMany(Pelada::class);
    }

    public function peladasAvailable($filter = null){
        
        $peladas = Pelada::whereNotIn('id', function($query){
            $query->select('jogador_pelada.pelada_id');
            $query->from('jogador_pelada');
            $query->whereRaw("jogador_pelada.jogador_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if($filter){
                $queryFilter->where('peladas.nome', 'LIKE', "%{$filter}%");}
        })
        ->paginate();

        return $peladas;
    }
}

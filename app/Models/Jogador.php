<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';
    protected $fillable = ['nome', 'apelido', 'email', 'senha'];
}

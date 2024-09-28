<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolarimentriaDados extends Model
{
    use HasFactory;
    //Nome da tabela
    protected $table = 'solarimetria_dados';

    //Definição dos campos
    protected $fillable = [
        'medicao',
        'velocidade',
        'temperatura',
        'umidade_relativa',
        'precipitacao',
        'irradiacao_solar',
    ];

    //Campos de controlde e transação
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
}

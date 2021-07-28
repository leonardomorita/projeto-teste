<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'pessoas';
    protected $fillable = ['pes_nome', 'pes_data_nascimento', 'pes_cpf', 'pes_telefone', 'prof_id', 'pes_observacoes'];

    public function profissao()
    {
        return $this->belongsTo(Profissao::class, 'prof_id', 'prof_id');
    }
}

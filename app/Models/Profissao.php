<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'profissoes';
    protected $fillable = ['prof_nome'];

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class);
    }
}

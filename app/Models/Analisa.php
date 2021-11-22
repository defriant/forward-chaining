<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisa extends Model
{
    use HasFactory;

    protected $table = 'analisa';
    protected $fillable = [
        'id',
        'nama',
        'email',
        'hasil_akhir'
    ];

    public function goal()
    {
        return $this->hasOne(Goal::class, 'id', 'hasil_akhir');
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'id_analisa', 'id');
    }
}

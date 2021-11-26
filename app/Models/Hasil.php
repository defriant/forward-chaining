<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table = 'hasil';
    protected $fillable = [
        'id_analisa',
        'id_premis',
        'pertanyaan',
        'jawaban'
    ];

    public function premis()
    {
        return $this->hasOne(Premis::class, 'id', 'id_premis');
    }
}

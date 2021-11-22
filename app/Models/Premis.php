<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premis extends Model
{
    use HasFactory;

    protected $table = 'premis';
    protected $fillable = [
        'id',
        'pertanyaan'
    ];

    public $incrementing = false;

    public function rule()
    {
        return $this->hasMany(Rule::class, 'id_premis', 'id');
    }
}

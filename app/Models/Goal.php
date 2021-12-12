<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $table = 'goal';
    protected $fillable = [
        'id',
        'jurusan',
        'deskripsi'
    ];

    public $incrementing = false;

    public function rule()
    {
        return $this->hasMany(Rule::class, 'id_goal', 'id')->orderBy('id_premis');
    }
}

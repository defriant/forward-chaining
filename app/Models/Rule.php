<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $table = 'rule';
    protected $fillable = [
        'id_goal',
        'id_premis'
    ];

    public function goal()
    {
        return $this->hasOne(Goal::class, 'id', 'id_goal');
    }

    public function premis()
    {
        return $this->hasOne(Premis::class, 'id', 'id_premis');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\WeightLogFactory;

class WeightLog extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return WeightLogFactory::new();
    }

    protected $fillable = [
        'date',
        'weight',
        'calories',
        'exercise_time',
        'exercise_content',
    ];
}

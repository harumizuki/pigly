<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\WeightTargetFactory;

class WeightTarget extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return WeightTargetFactory::new();
    }
}

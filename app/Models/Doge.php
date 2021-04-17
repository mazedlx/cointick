<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doge extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'value' => 'integer',
    ];

    public function getValueAttribute($value)
    {
        return number_format($value / 10E6, 6);
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $value * 10E6;
    }
}

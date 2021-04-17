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

    protected $appends = [
        'timestamp',
    ];

    public function getValueAttribute($value)
    {
        return number_format($value / 10E6, 6);
    }

    public function getTimestampAttribute()
    {
        return $this->created_at->format('H:i:s');
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $value * 10E6;
    }
}

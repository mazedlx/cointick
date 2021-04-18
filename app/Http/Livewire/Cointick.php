<?php

namespace App\Http\Livewire;

use App\Models\Doge;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Cointick extends Component
{
    public $doge;
    //public $coins = 221.0307;
    public $coins = 1034.9552;
    public $avg;
    public $max;
    public $min;
    public $lastTenDoges;
    public $direction;

    public function render()
    {
        $this->doge = Doge::latest()->first();
        $this->avg = Doge::latest()->take(10)->avg('value') / 10E6;
        $this->min = Doge::min('value') / 10E6;
        $this->max = Doge::max('value') / 10E6;
        $lastTwo = Doge::latest()->take(2)->get();
        $this->direction = 'down';
        if ($lastTwo->first()->value === $lastTwo->last()->value) {
            $this->direction = '~';
        }
        if ($lastTwo->first()->value >= $lastTwo->last()->value) {
            $this->direction = 'up';
        }

        return view('livewire.cointick');
    }
}

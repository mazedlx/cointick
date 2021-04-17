<?php

namespace App\Http\Livewire;

use App\Models\Doge;
use Livewire\Component;

class Chart extends Component
{
    public $doge;
    public $min;
    public $max;

    public function fetchDoge()
    {
        $this->doge = Doge::latest()->first();
        $this->min = Doge::latest()->take(10)->min('value') / 10E6;
        $this->max = Doge::latest()->take(10)->max('value') / 10E6;
    }

    public function updateChart()
    {
        $this->fetchDoge();

        $this->emit('update-chart', $this->doge, $this->min, $this->max);
    }

    public function render()
    {
        return view('livewire.chart');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Doge;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDoge extends Command
{
    protected const URL = "https://api.coingecko.com/api/v3//coins/dogecoin";

    protected $signature = 'doge:get';

    protected $description = 'Get current Doge value.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $json = Http::get(self::URL)->json();
        $this->value = $json['market_data']['current_price']['eur'];
        $this->avg = Doge::latest()->take(50)->avg('value') / 10E6;
        $doge = Doge::create([
            'value' => $this->value,
        ]);
        return $doge->id;
    }
}

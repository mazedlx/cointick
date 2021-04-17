<div wire:poll.1s class="flex flex-col items-center justify-center w-full h-screen bg-yellow-400">
    <div class="font-mono text-white">wow. much crypto. such money.</div>
    <div class="font-mono text-lg text-white">{{ date('H:i:s') }}</div>

    <h1 class="font-mono text-6xl font-bold text-white">current € {{ $doge->value }} {{ $direction }}</h1>

    <h2 class="font-mono text-4xl font-bold text-white">total € {{ number_format($doge->value * $coins, 6) }}</h2>

    <h2 class="font-mono text-4xl font-bold text-white">avg € {{ number_format($avg, 6) }}</h2>
    <h2 class="font-mono text-4xl font-bold text-white">hi € {{ number_format($max, 6) }}</h2>
    <h2 class="font-mono text-4xl font-bold text-white">lo € {{ number_format($min, 6) }}</h2>
</div>

<?php

namespace App\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Location
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public static function get(): object
    {
        $cacheKey = "prayer_location_" . (Auth::check() ? Auth::id() : session()->getId());
        $cacheDuration = Auth::check() ? now()->addYears(1) : now()->addHours(6);
        // Cache::forget($cacheKey);
        return Cache::remember($cacheKey, $cacheDuration, function () {
            $data = Http::retry(3, 100)
                ->withQueryParameters([
                    'apiKey' => Config::get('app.ipgeolocation_key'),
                ])
                ->get('https://api.ipgeolocation.io/ipgeo')
                ->json();
                return (object) [
                    'latitude' => $data['latitude'],
                    'longitude' => $data['longitude'],
                    'place' => $data['city'],
                ];
        });
    }

}

<?php

namespace App\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Location
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function get()
    {
        $cacheKey = "prayer_times_" . (Auth::check() ? Auth::id() : session()->getId());

        return Cache::rememberForever($cacheKey, function () {
            $response = Http::retry(3, 100)->withQueryParameters([])->get('https://www.gps-coordinates.net/api/eiffeltower')->json();
        });
    }
}

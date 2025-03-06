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
            $ip = request()->ip();

            // Check if the IP is local
            if ($ip == '127.0.0.1' || $ip == '::1' || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.') || str_starts_with($ip, '172.16.')) {
                return (object) [
                    'latitude' => '23.8103', // Example: Default latitude (Dhaka, BD)
                    'longitude' => '90.4125', // Example: Default longitude (Dhaka, BD)
                    'place' => 'Dhaka, Bangladesh', // Default place
                ];
            }

            // Fetch geolocation from API for public IPs
            $data = Http::retry(3, 100)
                ->withQueryParameters([
                    'apiKey' => Config::get('app.ipgeolocation_key'),
                    'ip' => $ip,
                ])
                ->get('https://api.ipgeolocation.io/ipgeo')
                ->json();

            return (object) [
                'latitude' => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,
                'place' => ($data['city'] ?? '') . ', ' . ($data['state_prov'] ?? '') . ', ' . ($data['country_name'] ?? ''),
            ];
        });

    }

}

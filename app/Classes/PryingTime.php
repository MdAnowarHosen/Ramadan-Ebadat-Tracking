<?php

namespace App\Classes;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Rakibhstu\Banglanumber\NumberToBangla;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class PryingTime
{
    /**
     * Create a new class instance.
     */

    public function __construct() {}

    /**
     * @date string
     * it should be in the format DD-MM-YYYY
     */
    public static function get(string $latitude, string $longitude, ?string $date = null): object
    {
        $cacheKey = "prayer_times_" . (Auth::check() ? Auth::id() : request()->ip());
        return Cache::remember($cacheKey, now()->addHours(1), function () use ($latitude, $longitude, $date) {
            $date = $date ?? now()->format('Y-m-d');

            $response = Http::retry(3, 100)->withQueryParameters([
                'latitude' => $latitude,
                'longitude' => $longitude,
                'method' => '1', // University of Islamic Sciences, Karachi
                'timezonestring' => 'Asia/Dhaka',
                'iso8601' => 'true',
            ])->get('https://api.aladhan.com/v1/timings/' . $date)->json();


            $numto = new NumberToBangla();
            $timing = collect($response['data']['timings']) ?? [];

            // Convert each time to 12-hour format
            return $timing->each(function ($time, $key) use ($timing, $numto) {
                $time = Carbon::parse($time);
                $timing[$key] = $numto->bnNum($time->format('g')) . ':' . $numto->bnNum($time->format('i'));
            });
        });
    }
}

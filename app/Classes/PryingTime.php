<?php

namespace App\Classes;

use App\Classes\Location;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Rakibhstu\Banglanumber\NumberToBangla;

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
    public static function get(?string $latitude = null, ?string $longitude = null, ?string $date = null): object
    {
        $cacheKey = "prayer_times_" . (Auth::check() ? Auth::id() : request()->ip());
        // Cache::forget($cacheKey);

        // get location
        $location = Location::get();
        $latitude = $latitude ?? $location->latitude;
        $longitude = $longitude ?? $location->longitude;
        $place = $location->place;

        return Cache::remember($cacheKey, now()->addHours(1), function () use ($latitude, $longitude, $date, $place) {
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
            $data = $timing->each(function ($time, $key) use ($timing, $place, $numto) {
                $time = Carbon::parse($time);
                $timing[$key] = $numto->bnNum($time->format('g')) . ':' . $numto->bnNum($time->format('i'));
            });

            // add place in data
            $data['place'] = $place;

            return $data;
        });
    }
}

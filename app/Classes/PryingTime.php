<?php

namespace App\Classes;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
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
    public static function get(string $latitude, string $longitude, ?string $date = null): array
    {
        $date = $date ?? now()->format('Y-m-d');

        return Http::retry(3, 100)->withQueryParameters([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'method' => '1', // University of Islamic Sciences, Karachi
            'timezonestring' => 'Asia/Dhaka',
            'iso8601' => 'true',
        ])->get('https://api.aladhan.com/v1/timings/' . $date)->json();
    }

    public static function getTiming(array $data = []): object
    {
        $numto = new NumberToBangla();
        $timing = collect($data['data']['timings']) ?? [];

        // Convert each time to 12-hour format
        return $timing->each(function ($time, $key) use ($timing, $numto) {
            $time = Carbon::parse($time);
            $timing[$key] = $numto->bnNum($time->format('g')) . ':' . $numto->bnNum($time->format('i'));
        });
    }
}

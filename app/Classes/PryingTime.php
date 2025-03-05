<?php

namespace App\Classes;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class PryingTime
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * @date string
     * it should be in the format DD-MM-YYYY
     */
    public static function get(string $latitude, string $longitude, string $date): array
    {
      return  $response = Http::retry(3, 100)->withQueryParameters([
            'latitude' => $latitude,
            'longitude' => $longitude,
            'method' => '1', // University of Islamic Sciences, Karachi
            'timezonestring' => 'Asia/Dhaka',
        ])->get('https://api.aladhan.com/v1/timings/'.$date)->json();
    }

    public static function getTiming(array $data): object
    {
        return (object) $data['data'];
    }
}

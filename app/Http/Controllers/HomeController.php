<?php

namespace App\Http\Controllers;

use App\Classes\PryingTime;
use App\Models\QuranTrack;
use App\Models\Task;
use App\Models\Salat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Rakibhstu\Banglanumber\NumberToBangla;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

       $data = PryingTime::get('24.368150998074952', '88.60129668385959', now()->format('Y-m-d'));
     return  $timing = PryingTime::getTiming($data);

        $date = $request->date ?? now()->format('Y-m-d');

        // Validate date format
        if (!Carbon::hasFormat($date, 'Y-m-d')) {
            $date = now()->format('Y-m-d');
        }

        $dayName = Carbon::parse($date)->format('l');



        // subtract 1 day for hijri date
        $forHijriDateAdjust = Carbon::parse($date)->subDay()->format('Y-m-d');

        $tasks = Task::withExists(['users as owned' => function ($query) use ($date) {
            $query->where('user_id', Auth::id())
                ->whereDate('task_user.created_at', $date); // Ensure you reference the pivot table's `created_at`
        }])->get();

        $numto = new NumberToBangla();
        // return $tasks;

        // $salats = Salat::withExists(['users as owned' => function ($query) use ($date) {
        //     $query->where('user_id', Auth::id())
        //           ->whereDate('salat_user.created_at', $date); // Ensure you reference the pivot table's `created_at`
        // }])->get();

        // return $salats;

        $exclude = $dayName === "Friday" ? ["যোহর"] : ["জুম'আ"];


        $salats = Salat::orderBy('position')->whereNotIn('name', $exclude)->with(['users' => function ($query) use ($date) {
            $query->where('user_id', Auth::id())
                ->whereDate('salat_user.created_at', $date)
                ->select('users.id', 'salat_user.sunnah_rakat', 'salat_user.created_at', 'salat_user.updated_at');
        }])->get()->map(function ($salat) {
            $userPivot = $salat->users->first()?->pivot;


            return [
                'id' => $salat->id,
                'name' => $salat->name,
                'faraj_rakat' => $salat->faraj_rakat,
                'created_at' => $salat->created_at,
                'updated_at' => $salat->updated_at,
                'owned' => $userPivot !== null, // Checks if the user has an entry
                'sunnah_rakat' => $userPivot?->sunnah_rakat,
                'pivot_created_at' => $userPivot?->created_at,
                'pivot_updated_at' => $userPivot?->updated_at
            ];
        });


        // Cache::forget('todays_ayat');
        $todays_ayat = Cache::remember('todays_ayat', 86400, function () use ($numto) {
            $response = Http::retry(3, 100)->withQueryParameters([
                'translations' => '163',
                'fields' => 'text_uthmani,chapter_id,hizb_number,text_imlaei_simple',
                'words' => 'false',
            ])->get('https://api.quran.com/api/v4/verses/random')->json();

            return (object) [
                'verse' => $numto->bnNum($response['verse']['chapter_id']) . ':' . $numto->bnNum($response['verse']['verse_number']),
                'arabic_text' => $response['verse']['text_uthmani'],
                'bangla_text' => $response['verse']['translations'][0]['text'],
            ];
        });


        return inertia('Ramadan', [
            'date' => $date,
            'hijri_date_adjust' => $forHijriDateAdjust,
            'salats' => $salats,
            'quran_data' => $quran_data ?? [
                'ayat' => 0,
                'page' => 0,
                'para' => 0,
            ],
            'tasks' => $tasks,
            'todays_ayat' => $todays_ayat,
        ]);
    }
}

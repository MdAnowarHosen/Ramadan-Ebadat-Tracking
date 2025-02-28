<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $last_week_salats = $user->get_salats()
            ->wherePivot('created_at', '>=', now()->subWeek())
            ->get();

        // last week total sunnah rakat
        $last_week_total_sunnah_rakat = $last_week_salats->sum(fn($salat) => $salat->pivot->sunnah_rakat ?? 0);

        // Filter today's salats
        $todays_salats = $last_week_salats->filter(function ($salat) {
            return Carbon::parse($salat->pivot->created_at)->isToday();
        });

        // todays total sunnah rakat
        $todays_sunnah_rakat = $last_week_salats->sum(fn($salat) => $salat->pivot->sunnah_rakat ?? 0);


        $salat_data = (object) [
            'salat' => (object) [
                'last_week' => (object) [
                    'total_wakto' => $last_week_salats->count(),
                    'total_faraj_rakat' => $last_week_salats->sum('faraj_rakat'),
                    'total_sunnah_rakat' => $last_week_total_sunnah_rakat,
                ],
                'today' => (object) [
                    'total_wakto' => $todays_salats->count(),
                    'total_faraj_rakat' => $todays_salats->sum('faraj_rakat'),
                    'total_sunnah_rakat' => $todays_sunnah_rakat,
                ],
            ],
        ];


        return response()->json($salat_data);


        return inertia('Report');
    }
}

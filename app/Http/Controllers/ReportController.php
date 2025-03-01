<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Rakibhstu\Banglanumber\NumberToBangla;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $numto = new NumberToBangla();

        // =============================================================
        // =============================================================

        // salats
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

        // =============================================================
        // =============================================================
        // tasks
        $last_week_tasks = $user->get_tasks()
            ->wherePivot('created_at', '>=', now()->subWeek())
            ->get();


        // Filter today's salats
        $todays_tasks = $last_week_tasks->filter(function ($task) {
            return Carbon::parse($task->pivot->created_at)->isToday();
        });

        // =============================================================
        // =============================================================

        $last_week_quran_track = $user->quran_tracks()->whereDate('created_at', '>=', now()->subWeek())->get();
        $todays_quran_track = $last_week_quran_track->filter(function ($quran) {
            return Carbon::parse($quran->created_at)->isToday();
        })->first();

        $data = (object) [
            'salat' => (object) [
                'today' => (object) [
                    'total_wakto' => $numto->bnNum($todays_salats->count() ?? 0),
                    'total_faraj_rakat' => $numto->bnNum($todays_salats->sum('faraj_rakat') ?? 0),
                    'total_sunnah_rakat' => $numto->bnNum($todays_sunnah_rakat ?? 0 ),
                ],
                'last_week' => (object) [
                    'total_wakto' => $numto->bnNum($last_week_salats->count() ?? 0 ),
                    'total_faraj_rakat' => $numto->bnNum($last_week_salats->sum('faraj_rakat') ?? 0 ),
                    'total_sunnah_rakat' => $numto->bnNum($last_week_total_sunnah_rakat ?? 0 ),
                ],
            ],
            'quran_track' => (object) [
                'today' => (object) [
                    'total_ayat' => $numto->bnNum($todays_quran_track->ayat ?? 0 ),
                    'total_page' => $numto->bnNum($todays_quran_track->page ?? 0 ),
                    'total_para' => $numto->bnNum($todays_quran_track->para ?? 0 ),
                ],
                'last_week' => (object) [
                    'total_ayat' => $numto->bnNum($last_week_quran_track->sum('ayat') ?? 0 ),
                    'total_page' => $numto->bnNum($last_week_quran_track->sum('page') ?? 0 ),
                    'total_para' => $numto->bnNum($last_week_quran_track->sum('para') ?? 0 ),
                ],
            ],
            'task' => (object) [
                'today' => (object) [
                    'total_tasks' => $numto->bnNum($todays_tasks->count() ?? 0 ),
                ],
                'last_week' => (object) [
                    'total_tasks' => $numto->bnNum($last_week_tasks->count() ?? 0 ),
                ],
            ],
        ];

        return inertia('Report', ['data' => $data]);
    }
}

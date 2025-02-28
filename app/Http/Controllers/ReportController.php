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
                    'total_wakto' => $todays_salats->count(),
                    'total_faraj_rakat' => $todays_salats->sum('faraj_rakat'),
                    'total_sunnah_rakat' => $todays_sunnah_rakat,
                ],
                'last_week' => (object) [
                    'total_wakto' => $last_week_salats->count(),
                    'total_faraj_rakat' => $last_week_salats->sum('faraj_rakat'),
                    'total_sunnah_rakat' => $last_week_total_sunnah_rakat,
                ],
            ],
            'quran_track' => (object) [
                'today' => (object) [
                    'total_ayat' => $todays_quran_track->ayat,
                    'total_page' => $todays_quran_track->page,
                    'total_para' => $todays_quran_track->para,
                ],
                'last_week' => (object) [
                    'total_ayat' => $last_week_quran_track->sum('ayat'),
                    'total_page' => $last_week_quran_track->sum('page'),
                    'total_para' => $last_week_quran_track->sum('para'),
                ],
            ],
            'task' => (object) [
                'today' => (object) [
                    'total_tasks' => $todays_tasks->count(),
                ],
                'last_week' => (object) [
                    'total_tasks' => $last_week_tasks->count(),
                ],
            ],
        ];

        return inertia('Report', ['data' => $data]);
    }
}

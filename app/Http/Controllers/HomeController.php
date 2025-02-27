<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Salat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {



        $date = $request->date ?? now()->format('Y-m-d');

        // Validate date format
        if (!Carbon::hasFormat($date, 'Y-m-d')) {
            $date = now()->format('Y-m-d');
        }

        $tasks = Task::withExists(['users as owned' => function ($query) use ($date) {
            $query->where('user_id', Auth::id())
                  ->whereDate('task_user.created_at', $date); // Ensure you reference the pivot table's `created_at`
        }])->get();

        // return $tasks;

        $salats = Salat::withExists(['users as owned' => function ($query) use ($date) {
            $query->where('user_id', Auth::id())
                  ->whereDate('salat_user.created_at', $date); // Ensure you reference the pivot table's `created_at`
        }])->get();

        // return $salats;

        return inertia('Ramadan', [
            'salats' => $salats,
            'tasks' => $tasks,
            'date' => $date,
        ]);
    }
}

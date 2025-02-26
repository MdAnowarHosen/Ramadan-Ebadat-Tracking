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

        // Fetch all tasks
        $tasks = Task::withExists(['users as is_user_assigned' => function ($query) {
            $query->where('user_id', Auth::id());
        }])
            ->get();

        // Determine `owned` based on the selected date
        $tasks->each(function ($task) use ($date) {
            $task->owned = $task->is_user_assigned && $task->created_at->format('Y-m-d') === $date;
        });


        return inertia('Ramadan', [
            'salats' => Salat::all(),
            'tasks' => $tasks,
            'date' => $date,
        ]);
    }
}

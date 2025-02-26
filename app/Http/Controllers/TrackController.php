<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TrackController extends Controller
{
    // public function updateTask(Request $request, Task $task)
    // {
    //     $date = $request->date ?? now()->format('Y-m-d');

    //     // Validate date format
    //     if (!Carbon::hasFormat($date, 'Y-m-d')) {
    //         $date = now()->format('Y-m-d');
    //     }

    //     auth()->user()->tasks($date)->toggle($task->id);
    //     // Update created_at if needed (make sure it's a new task or appropriate condition)
    //     $task->update(['created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);

    // }



    // public function updateTask(Request $request, Task $task)
    // {
    //     // Get the date from the request or default to the current date
    //     $date = $request->date ?? now()->format('Y-m-d');

    //     // Validate date format
    //     $validatedDate = Carbon::createFromFormat('Y-m-d', $date);
    //     if (!$validatedDate) {
    //         // If the date is invalid, fall back to today's date
    //         $date = now()->format('Y-m-d');
    //     }

    //     // Toggle task on the pivot table (toggle the relationship)
    //     $user = auth()->user();
    //     $pivot = $user->tasks($date)->wherePivot('task_id', $task->id)->first();

    //     // dd($pivot);

    //     if ($pivot) {
    //         // If the task is already assigned for that date, you can update the pivot's created_at
    //         $user->tasks($date)->updateExistingPivot($task->id, ['created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);
    //     } else {
    //         // If it's not assigned yet, toggle will add the record
    //         $user->tasks($date)->attach($task->id);
    //         // Update the task itself if needed
    //         $task->update(['created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);
    //     }
    // }



    public function updateTask(Request $request, Task $task)
    {
        // Get the date from the request or default to the current date
        $date = $request->date ?? now()->format('Y-m-d');

        // Validate date format
        $validatedDate = Carbon::createFromFormat('Y-m-d', $date);
        if (!$validatedDate) {
            // If the date is invalid, fall back to today's date
            $date = now()->format('Y-m-d');
        }

        // Toggle task on the pivot table (attach the task if it's not yet assigned for that date)
        $user = auth()->user();

        // Check if the task is already assigned for the specific date
        $existingPivot = $user->tasks($date)->wherePivot('task_id', $task->id)->first();
        // dd($existingPivot);
        if (!$existingPivot) {
            // If not assigned, attach the task to the user for the given date
            $user->tasks($date)->attach($task->id, ['created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);
        }

        // Optionally, you can update the task itself if needed
        $task->update(['created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);
    }
}

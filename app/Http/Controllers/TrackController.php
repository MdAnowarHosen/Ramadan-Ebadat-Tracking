<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Salat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{


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

        DB::beginTransaction();
        try {
            // Check if the task is already assigned for the specific date
            $existingPivot = $user->tasks($date)->wherePivot('task_id', $task->id)->first();
            // dd($existingPivot);
            if (!$existingPivot) {
                // If not assigned, attach the task to the user for the given date
                $user->tasks($date)->attach($task->id, ['created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);
            } else {
                // detach
                $user->tasks($date)->detach($task->id);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updateSalat(Request $request, Salat $salat)
    {
        // Get the date from the request or default to the current date
        $date = $request->date ?? now()->format('Y-m-d');

        // Validate date format
        $validatedDate = Carbon::createFromFormat('Y-m-d', $date);
        if (!$validatedDate) {
            // If the date is invalid, fall back to today's date
            $date = now()->format('Y-m-d');
        }

        // Toggle salat on the pivot table (attach the salat if it's not yet assigned for that date)
        $user = auth()->user();

        DB::beginTransaction();
        try {
            // Check if the salat is already assigned for the specific date
            $existingPivot = $user->salats($date)->wherePivot('salat_id', $salat->id)->first();
            // dd($existingPivot);
            if (!$existingPivot) {
                // If not assigned, attach the salat to the user for the given date
                $user->salats($date)->attach($salat->id, ['created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);
            } else {
                // detach
                $user->salats($date)->detach($salat->id);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    public function updateSunnahSalat(Request $request, Salat $salat)
    {
        // Get the date from the request or default to the current date
        $date = $request->date ?? now()->format('Y-m-d');

        // Validate date format
        $validatedDate = Carbon::createFromFormat('Y-m-d', $date);
        if (!$validatedDate) {
            // If the date is invalid, fall back to today's date
            $date = now()->format('Y-m-d');
        }

        $sunnah_rakat = $request->sunnah_rakat;

        // Toggle salat on the pivot table (attach the salat if it's not yet assigned for that date)
        $user = auth()->user();

        DB::beginTransaction();
        try {
            // Check if the salat is already assigned for the specific date
            $existingPivot = $user->salats($date)->wherePivot('salat_id', $salat->id)->first();

            // if pivot exists then update that with sunnah_rakat
            // else if not exists then attach
            if ($existingPivot) {
                // update pivot with sunnah_rakat
                $user->salats($date)->updateExistingPivot($salat->id, ['sunnah_rakat' => $sunnah_rakat]);
            } else {
                // $user->salats($date)->detach($salat->id);
                $user->salats($date)->attach($salat->id, ['sunnah_rakat' => $sunnah_rakat, 'created_at' => Carbon::parse($date), 'updated_at' => Carbon::parse($date)]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}

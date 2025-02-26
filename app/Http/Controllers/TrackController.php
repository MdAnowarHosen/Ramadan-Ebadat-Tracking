<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class TrackController extends Controller
{
    public function updateTask(Request $request, Task $task)
    {
        $action = auth()->user()->tasks()->toggle($task->id);
    }
}

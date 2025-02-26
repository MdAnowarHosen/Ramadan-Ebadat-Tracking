<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Salat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return inertia('Ramadan', [
            'salats' => Salat::all(),
            'tasks' => Task::all(),
        ]);
    }
}

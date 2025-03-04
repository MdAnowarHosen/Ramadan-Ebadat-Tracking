<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salat;
use Illuminate\Http\Request;

class AdminSalatController extends Controller
{
    public function index(Request $request)
    {
        $data = Salat::all();
        return inertia('Admin/Salat/Salat', ['data' => $data]);
    }
}

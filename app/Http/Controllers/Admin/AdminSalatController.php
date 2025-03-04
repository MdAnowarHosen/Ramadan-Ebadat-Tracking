<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalatStoreRequest;
use App\Models\Salat;
use Illuminate\Http\Request;

class AdminSalatController extends Controller
{
    public function index(Request $request)
    {
        $data = Salat::all();
        return inertia('Admin/Salat/Salat', ['data' => $data]);
    }

    public function create()
    {
        return inertia('Admin/Salat/SalatCreate');
    }

    public function store(SalatStoreRequest $request)
    {
        $validatedData = $request->validated();
        Salat::create([
            'name' => $validatedData['name'],
            'faraj_rakat' => $validatedData['rakat'],
        ]);
    }
}

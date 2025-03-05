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
        $last_position = Salat::max('position');
        return inertia('Admin/Salat/SalatCreate', ['last_position' => $last_position]);
    }

    public function store(SalatStoreRequest $request)
    {
        $validatedData = $request->validated();
        Salat::create([
            'name' => $validatedData['name'],
            'faraj_rakat' => $validatedData['faraj_rakat'],
            'position' => $validatedData['position'],
        ]);
    }

    public function edit(Salat $salat)
    {
        return inertia('Admin/Salat/SalatEdit', ['data' => $salat]);
    }

    public function update(SalatStoreRequest $request, Salat $salat)
    {
        $validatedData = $request->validated();
        $salat->name = $validatedData['name'];
        $salat->faraj_rakat = $validatedData['faraj_rakat'];
        $salat->position = $validatedData['position'];
        $salat->update();
    }

    public function destroy(Salat $salat)
    {
        $salat->delete();
    }
}

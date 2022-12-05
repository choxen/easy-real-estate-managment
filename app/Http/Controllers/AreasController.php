<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\StoreRequest;
use App\Http\Requests\Area\UpdateRequest;
use App\Models\Area;
use App\Models\Land;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AreasController extends Controller
{
    public function show(Area $area): View
    {
        return view('area.show', [
            'area' => $area
        ]);
    }

    public function edit(Area $area): View
    {
        return view('area.edit', [
            'area' => $area
        ]);
    }

    public function create(Land $land): View
    {
        return view('area.create', [
            'land' => $land
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $area = Area::create($request->validated());

        return redirect()->to(route('area.show', $area));
    }

    public function update(UpdateRequest $request, Area $area): RedirectResponse
    {
        $area->update($request->validated());

        return redirect()->to(route('area.show', $area));
    }
}

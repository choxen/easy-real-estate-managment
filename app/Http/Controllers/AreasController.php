<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\StoreRequest;
use App\Http\Requests\Area\UpdateRequest;
use App\Models\Area;
use App\Models\Land;
use App\Services\AreasService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AreasController extends Controller
{
    protected AreasService $service;

    public function __construct(AreasService $service)
    {
        $this->service = $service;
    }

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
        $land = Land::findOrFail($request->land_id);
        $unusedArea = 0;

        if (!$this->service->hasSpaceForArea($land, $unusedArea, $request->area_covered)) {
            return redirect()->back()->withErrors(['error' => 'This land has not enough total area for this amount of area covered']);
        }

        $area = Area::create($request->validated());

        return redirect()->to(route('area.show', $area));
    }

    public function update(UpdateRequest $request, Area $area): RedirectResponse
    {
        $land = $area->land;
        if (!$this->service->hasSpaceForArea($land, $area->area_covered, $request->area_covered ?: $area->area_covered)) {
            return redirect()->back()->withErrors(['error' => 'This land has not enough total area for this amount of area covered']);
        }

        $area->update($request->validated());

        return redirect()->to(route('area.show', $area));
    }
}

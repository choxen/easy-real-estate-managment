<?php

namespace App\Http\Controllers;

use App\Http\Requests\Land\StoreRequest;
use App\Http\Requests\Land\UpdateRequest;
use App\Models\Land;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LandsController extends Controller
{
    public function show(Land $land): View
    {
        return view('land.show', [
            'land' => $land,
            'areas' => $land->areas()->paginate(self::ITEMS_PER_PAGE),
        ]);
    }

    public function create(Property $property): View
    {
        return view('land.create', [
            'property' => $property
        ]);
    }

    public function edit(Land $land): View
    {
        return view('land.edit', [
            'land' => $land
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $land = Land::create($request->validated());

        return redirect()->to(route('land.show', $land));
    }

    public function update(UpdateRequest $request, Land $land): RedirectResponse
    {
        $land->update($request->validated());

        return redirect()->to(route('land.show', $land));
    }
}

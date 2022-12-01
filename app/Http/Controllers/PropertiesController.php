<?php

namespace App\Http\Controllers;

use App\Http\Requests\Property\StoreRequest;
use App\Http\Requests\Property\UpdateRequest;
use App\Models\Client;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PropertiesController extends Controller
{
    private const ITEMS_PER_PAGE = 10;

    public function show(Property $property): View
    {
        return view('property.show', [
            'property' => $property,
            'lands' => $property->lands()->paginate(self::ITEMS_PER_PAGE),
        ]);
    }

    public function create(Client $client): View
    {
        return view('property.create', [
            'client' => $client
        ]);
    }

    public function edit(Property $property): View
    {
        return view('property.edit', [
            'property' => $property
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $property = Property::create($request->validated());

        return redirect()->to(route('property.show', $property));
    }

    public function update(UpdateRequest $request, Property $property): RedirectResponse
    {
        $property = $property->update($request->validated());
        return redirect()->to(route('property.show', $property));
    }
}

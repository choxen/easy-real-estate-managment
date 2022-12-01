<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\UpdateRequest;
use App\Http\Requests\Client\StoreRequest;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ClientsController extends Controller
{
    private const ITEMS_PER_PAGE = 10;

    public function index()
    {
        $clients = Client::paginate(self::ITEMS_PER_PAGE);

        return view('client.index', [
            'clients' => $clients,
        ]);
    }

    public function create(): View
    {
        return view('client.create');
    }

    public function show(Client $client): View
    {
        return view('client.show', [
            'client' => $client,
        ]);
    }

    public function edit(Client $client): View
    {
        return view('client.edit', [
            'client' => $client,
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $client = Client::create($request->validated());

        return redirect()->to(route('client.show', $client));
    }

    public function update(UpdateRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return redirect()->to(route('client.show', $client));
    }
}

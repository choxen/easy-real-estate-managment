<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function dashboard(): View
    {
        return view('dashboard', [
            'clients' => Client::paginate(self::ITEMS_PER_PAGE),
        ]);
    }
}

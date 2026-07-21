<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(string $slug)
    {
        $service = Service::find($slug);

        if (!$service) {
            abort(404);
        }

        return view('services.detail', [
            'title' => $service['title'] . ' - WASH WISH WOOSH',
            'service' => $service,
        ]);
    }
}

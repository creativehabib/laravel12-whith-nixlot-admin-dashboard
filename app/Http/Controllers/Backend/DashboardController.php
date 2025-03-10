<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{

    public function __invoke()
    {
//       Gate::authorize('dashboard');
        return view('backend.dashboard');
    }
}

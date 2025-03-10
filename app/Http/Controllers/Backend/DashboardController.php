<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }
    public function __invoke()
    {
       Gate::authorize('admin-dashboard');
        return view('layouts.backend.dashboard');
    }
}

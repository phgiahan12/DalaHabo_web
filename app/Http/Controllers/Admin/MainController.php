<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Place\PlaceService;

class MainController extends Controller
{
    protected $placeService;

    public function __construct(PlaceService $placeService)
    {
        $this->placeService = $placeService;
    }

    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Tổng quan',
            'menu' => 'Tổng quan',
            'places' => $this->placeService->count(),
        ]);
    }
}

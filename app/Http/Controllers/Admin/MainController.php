<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Place\PlaceService;
use App\Http\Services\Tourguide\TourguideService;

class MainController extends Controller
{
    protected $placeService, $tourguideService;

    public function __construct(PlaceService $placeService, TourguideService $tourguideService)
    {
        $this->placeService = $placeService;
        $this->tourguideService = $tourguideService;
    }

    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Tổng quan',
            'menu' => 'Tổng quan',
            'places' => $this->placeService->count(),
            'tourguides' => $this->tourguideService->count(),
        ]);
    }
}

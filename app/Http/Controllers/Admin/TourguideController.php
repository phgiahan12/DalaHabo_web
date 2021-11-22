<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tourguide\CreateFormRequest;
use App\Http\Services\Tourguide\TourguideService;
use App\Http\Services\GalleryService;
use App\Models\Tourguide;

class TourguideController extends Controller
{
    protected $tourguideService;

    public function __construct(TourguideService $tourguideService, GalleryService $galleryService)
    {
        $this->tourguideService = $tourguideService;
        $this->galleryService = $galleryService;
    }

    public function all()
    {
        return view('admin.tourguides.all', [
            'title' => 'Hướng dẫn viên',
            'menu' => 'Danh sách hướng dẫn viên',
            'tourguides' => $this->tourguideService->getAll(),
            'count' => $this->tourguideService->count(),
        ]);
    }

    public function create()
    {
        return view('admin.tourguides.add', [
            'title' => 'Hướng dẫn viên',
            'menu' => 'Thêm hướng dẫn viên'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $rstourguide = $this->tourguideService->create($request);
        if ($rstourguide === true) {
            $tourguideId = $this->tourguideService->getTourguideId();
            $this->galleryService->createTourguideImages($request, $tourguideId);
        }
        return redirect()->back();
    }

    public function show(Tourguide $tourguide)
    {
        return view('admin.sliders.edit', [
            'title' => 'Slider',
            'menu' => 'Danh sách slider',
            'item' => $tourguide->name,
            'tourguide' => $tourguide
        ]);
    }

    // public function update(Tourguide $slider, CreateFormRequest $request)
    // {
    //     $this->sliderService->update($slider, $request);
    //     return redirect('admin/sliders/all');
    // }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->tourguideService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\GalleryService;
use App\Models\Place;
use App\Models\Tourguide;
use App\Http\Requests\Gallery\CreateFormRequest;

class GalleryController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    public function store(Request $request) {
        $url = $this->galleryService->store($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        };

        return response()->json(['error' => true]);
    }

    #Place Images
    public function allPlaceImages(Place $place)
    {
        return view('admin.placeimages.all', [
            'title' => 'Hình ảnh địa điểm',
            'menu' => $place->name,
            'images' => $this->galleryService->getAllPlacesImages($place),
            'count' => $this->galleryService->countPlaceImages($place),
        ]);
    }

    public function createPlaceImages(CreateFormRequest $request, Place $place)
    {
        $this->galleryService->createPlaceImages($request, $place->id);
        return redirect()->back();
    }

    public function destroyPlaceImages(Request $request): JsonResponse
    {
        $result = $this->galleryService->destroyPlaceImages($request);
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

    #Tourguide Images
    public function allTourguideImages(Tourguide $tourguide)
    {
        return view('admin.tourguideimages.all', [
            'title' => 'Hình ảnh hướng dẫn viên',
            'menu' => $tourguide->name,
            'images' => $this->galleryService->getAllTourguideImages($tourguide),
            'count' => $this->galleryService->countTourguideImages($tourguide),
        ]);
    }

    public function createTourguideImages(CreateFormRequest $request, Tourguide $tourguide)
    {
        $this->galleryService->createTourguideImages($request, $tourguide->id);
        return redirect()->back();
    }

    public function destroyTourguideImages(Request $request): JsonResponse
    {
        $result = $this->galleryService->destroyTourguideImages($request);
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

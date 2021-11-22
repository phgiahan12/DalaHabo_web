<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\GalleryService;
use App\Models\Place;
use App\Http\Requests\Gallery\CreateFormRequest;

class GalleryController extends Controller
{
    protected $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    public function allPlaceImages(Place $place)
    {
        return view('admin.galleries.all', [
            'title' => 'Địa điểm',
            'menu' => $place->name,
            'images' => $this->galleryService->getAll($place),
            'count' => $this->galleryService->count($place),
        ]);
    }

    public function createPlaceImages(CreateFormRequest $request, Place $place)
    {
        $this->galleryService->createPlaceImages($request, $place->id);
        return redirect()->back();
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
}

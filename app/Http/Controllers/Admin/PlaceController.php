<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Place\CreateFormRequest;
use App\Http\Services\Place\PlaceService;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\GalleryService;

use App\Models\Place;
use Illuminate\Http\JsonResponse;

class PlaceController extends Controller
{
    protected $categoryService, $placeService, $galleryService;

    public function __construct(CategoryService $categoryService, PlaceService $placeService, GalleryService $galleryService)
    {
        $this->categoryService = $categoryService;
        $this->placeService = $placeService;
        $this->galleryService = $galleryService;
    }

    public function all()
    {
        return view('admin.places.all', [
            'title' => 'Địa điểm',
            'menu' => 'Danh sách địa điểm',
            'places' => $this->placeService->getAll(),
            'count' => $this->placeService->count(),
        ]);
    }

    public function create()
    {
        return view('admin.places.add', [
            'title' => 'Địa điểm',
            'menu' => 'Thêm địa điểm',
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    public function store(Request $request)
    {

        $rsplace = $this->placeService->create($request);
        if ($rsplace === true) {
            $placeId = $this->placeService->getPlaceId();
            $this->galleryService->createPlaceImages($request, $placeId);
        }
        return redirect()->back();
        
    }

    public function show(Place $place)
    {
        return view('admin.places.edit', [
            'title' => 'Địa điểm',
            'menu' => 'Danh sách địa điểm',
            'item' => $place->name,
            'place' => $place,
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    public function update(Place $place, CreateFormRequest $request)
    {
        $this->placeService->update($place, $request);
        return redirect('admin/places/all');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->placeService->destroy($request);
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

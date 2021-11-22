<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\CreateFormRequest;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function all()
    {
        return view('admin.sliders.all', [
            'title' => 'Slider',
            'menu' => 'Danh sách slider',
            'sliders' => $this->sliderService->getAll(),
            'count' => $this->sliderService->count(),
        ]);
    }

    public function create()
    {
        return view('admin.sliders.add', [
            'title' => 'Slider',
            'menu' => 'Thêm slider'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->sliderService->create($request);
        return redirect()->back();
    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.edit', [
            'title' => 'Slider',
            'menu' => 'Danh sách slider',
            'item' => $slider->name,
            'slider' => $slider
        ]);
    }

    public function update(Slider $slider, CreateFormRequest $request)
    {
        $this->sliderService->update($slider, $request);
        return redirect('admin/sliders/all');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->sliderService->destroy($request);
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

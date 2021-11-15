<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function all()
    {
        return view('admin.categories.all', [
            'title' => 'Tất cả danh mục',
            'menu' => 'Quản lý danh mục',
            'categories' => $this->categoryService->getAll(),
            'count' => $this->categoryService->count(),
        ]);
    }

    public function add()
    {
        return view('admin.categories.add', [
            'title' => 'Thêm danh mục',
            'menu' => 'Quản lý danh mục'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->categoryService->create($request);
        return redirect()->back();
    }

    public function show(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Cập nhật danh mục: ' . $category->name,
            'menu' => 'Quản lý danh mục',
            'category' => $category
        ]);
    }

    public function update(Category $category, CreateFormRequest $request)
    {
        $this->categoryService->update($category, $request);
        return redirect('admin/categories/all');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa danh mục thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}

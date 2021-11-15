<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CategoryService
{

    public function create($request)
    {
        try {
            Category::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'active' => (int) $request->input('active'),
            ]);
            Session::flash('success', 'Tạo danh mục mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll()
    {
        return Category::all();
    }

    public function count()
    {
        return DB::table('categories')->count();
    }

    public function update($category, $request)
    {
        try {
            $category->fill($request->input());
            $category->save();

            Session::flash('success', 'Cập nhật danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
        /*C2:
            $category->name = (string) $request->input('name');
            $category->description = (string) $request->input('description');
            $category->active = (int) $request->input('active');
        */
    }

    public function destroy($request)
    {
        $category = Category::where('id', $request->input('id'))->first();
        if ($category) {
            return Category::where('id', $request->input('id'))->delete();
        }
        return false;
    }
}

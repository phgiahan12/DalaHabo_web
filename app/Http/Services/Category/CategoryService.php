<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use App\Models\Place;
use App\Models\PlaceImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CategoryService
{

    public function create($request)
    {
        try {
            $request->except("_token");
            Category::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'active' => (int) $request->input('active'),
            ]);
            Session::flash('success', 'Tạo mới thành công');
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
        return Category::count();
    }

    public function update($category, $request)
    {
        try {
            $category->fill($request->input());
            $category->save();

            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getPlacesbyCategoryID($category) {
        return Place::where('category_id', $category->id)->get();
    }

    public function destroyImages($images) {
        $length = count($images);
        if ($images) {
            for($i = 0; $i < $length; $i++) {
                $path = str_replace('storage', 'public', $images[$i]->image);
                Storage::delete($path);
                $images[$i]->delete();
            }
            return true;
        }
        return false;
    }

    public function destroyPlaces($places) {
        $length = count($places);
        if ($places) {
            for($i = 0; $i < $length; $i++) {
                $images = PlaceImage::where('place_id', $places[$i]->id)->get();
                $result = $this->destroyImages($images);
                if ($result === true) {
                    $places[$i]->delete();
                }
            }
            return true;
        }
        return false;
    }

    public function destroy($request)
    {
        $category = Category::where('id', $request->input('id'))->first();
        if ($category) {
            $places = $this->getPlacesbyCategoryID($category);
            $result = $this->destroyPlaces($places);
            if ($result === true) {
                return Category::where('id', $request->input('id'))->delete();
            }
            return false;
        }
        return false;
    }
}

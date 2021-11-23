<?php

namespace App\Http\Services\Place;

use App\Models\Place;
use App\Models\PlaceImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PlaceService
{

    public function create($request)
    {
        try {
            $request->except("_token");
            Place::create([
                'name' => (string) $request->input('name'),
                'category_id' => (int) $request->input('categoryId'),
                'address' => (string) $request->input('address'),
                'location' => (string) $request->input('location'),
                'summary' => (string) $request->input('summary'),
                'description' => (string) $request->input('description'),
            ]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll()
    {
        return Place::with('category')->orderBy('name')->paginate(10);
    }

    public function getPlaceId()
    {
        $place = Place::all()->last();
        return $place->id;
    }

    public function count()
    {
        return Place::count();
    }

    public function update($place, $request)
    {
        try {
            $place->fill($request->input());
            $place->save();

            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroyImages($places) {
        $images = PlaceImage::where('place_id', $places->id)->get();
        $length = count($images);
        try {
            for($i = 0; $i < $length; $i++) {
                $path = str_replace('storage', 'public', $images[$i]->image);
                Storage::delete($path);
                $images[$i]->delete();
            }
        } catch (\Exception $err) {
            return false;
        }
        return true;   
    }

    public function destroy($request)
    {
        $places = Place::where('id', $request->input('id'))->first();
        if ($places) {
            $rs = $this->destroyImages($places);
            if ($rs === true) {
                return $places->delete();
            }
            return false;
        }
        return false;
    }
}

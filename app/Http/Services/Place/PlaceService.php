<?php

namespace App\Http\Services\Place;

use App\Models\Place;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
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
        return Place::all();
    }

    public function getPlaceIdByAdress($request)
    {
        $place = Place::where('address', $request->input('address'))->first();
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

            Session::flash('success', 'Cập nhật địa điểm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $category = Place::where('id', $request->input('id'))->first();
        if ($category) {
            return Place::where('id', $request->input('id'))->delete();
        }
        return false;
    }
}

<?php

namespace App\Http\Services\Tourguide;

use App\Models\Tourguide;
use App\Models\TourguideImage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TourguideService
{
    public function create($request)
    {
        try {
            $request->except("_token");
            Tourguide::create([
                'name' => (string) $request->input('name'),
                'dob' => (string) $request->input('dob'),
                'gender' => (integer) $request->input('gender'),
                'email' => (string) $request->input('email'),
                'phone' => (string) $request->input('phone'),
                'short_description' => (string) $request->input('short_description'),
                'description' => (string) $request->input('description'),
                'rental_price' => (double) $request->input('rental_price'),
            ]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll()
    {
        return Tourguide::orderBy('name')->paginate(10);
    }

    public function count()
    {
        return Tourguide::count();
    }

    public function getTourguideId()
    {
        $tourguide = Tourguide::all()->last();
        return $tourguide->id;
    }

    public function update($tourguide, $request)
    {
        try {
            $tourguide->fill($request->input());
            $tourguide->save();

            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroyImages($tourguide) {
        $images = TourguideImage::where('tourguide_id', $tourguide->id)->get();
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
        $tourguide = Tourguide::where('id', $request->input('id'))->first();
        if ($tourguide) {
            $rs = $this->destroyImages($tourguide);
            if ($rs === true) {
                return $tourguide->delete();
            }
            return false;
        }
        return false;
    }
    
}

<?php

namespace App\Http\Services;

use App\Models\PlaceImage;
use App\Models\TourguideImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class GalleryService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $get_full_image_name = $request->file('file')->getClientOriginalName();
                $image_name = current(explode('.', $get_full_image_name));
                $new_image_name = preg_replace('/\s+/', '', $image_name);
                $name = $new_image_name.rand(0, 99) . '.' . $request->file('file')->getClientOriginalExtension();

                $path_full = 'uploads/'. $request->input('folder');
                $request->file('file')->storeAs(
                    'public/' . $path_full, $name
                );

                return '/storage/' . $path_full . '/' . $name;

            } catch(\Exception $err) {
                return false;
            }
        }
    }

    # Place Images 

    public function getAllPlacesImages($place)
    {
        return PlaceImage::where('place_id', $place->id)->orderByDesc('created_at')->get();
    }

    public function countPlaceImages($place)
    {
        return $this->getAllPlacesImages($place)->count();
    }
    
    public function createPlaceImages($request, $placeId)
    {
        $files =  explode(',', $request->input('image'));
        $flength = count($files);
        if ($flength > 0) {
            for($i=0; $i <  $flength - 1; $i++) {
                $image_name = current(explode('.', $request->input('file')[$i]));  
                try {    
                    PlaceImage::create([
                        'name' => (string) $image_name,
                        'image' => (string) $files[$i],
                        'place_id' => (int) $placeId,
                    ]);

                } catch(\Exception $err) {
                    Session::flash('error', $err->getMessage());
                    return false;
                }
            }
            Session::flash('success', 'Tạo mới thành công');
        }
        
        return true;
    }

    public function destroyPlaceImages($request)
    {
        $image = PlaceImage::where('id', $request->input('id'))->first();
        if ($image) {
            try {
                $path = str_replace('storage', 'public', $image->image);
                Storage::delete($path);
                return $image->delete();
            } catch(\Exception $err) {
                return false;
            }
        }
        return false;
    }

    #Tourguide Images

    public function getAllTourguideImages($tourguide)
    {
        return TourguideImage::where('tourguide_id', $tourguide->id)->orderByDesc('created_at')->get();
    }

    public function countTourguideImages($tourguide)
    {  
        return $this->getAllTourguideImages($tourguide)->count();
    }

    public function createTourguideImages($request, $tourguideId)
    {
        $files =  explode(',', $request->input('image'));
        $flength = count($files);
        if ($flength > 0) {
            for($i=0; $i <  $flength - 1; $i++) {
                $image_name = current(explode('.', $request->input('file')[$i]));  
                try {    
                    TourguideImage::create([
                        'name' => (string) $image_name,
                        'image' => (string) $files[$i],
                        'tourguide_id' => (int) $tourguideId,
                    ]);

                } catch(\Exception $err) {
                    Session::flash('error', $err->getMessage());
                    return false;
                }
            }
            Session::flash('success', 'Tạo mới thành công');
        }
        
        return true;
    }

    public function destroyTourguideImages($request)
    {
        $image = TourguideImage::where('id', $request->input('id'))->first();
        if ($image) {
            try {
                $path = str_replace('storage', 'public', $image->image);
                Storage::delete($path);
                return $image->delete();
            } catch(\Exception $err) {
                return false;
            }
        }
        return false;
    }   
}

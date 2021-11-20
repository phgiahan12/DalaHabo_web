<?php

namespace App\Http\Services;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class GalleryService
{
    public function create($request, $placeId)
    {
        $files =  explode(',', $request->input('image'));
        $flength = count($files);
        if ($flength) {
            for($i=0; $i <  $flength - 1; $i++) {
                $image_name = current(explode('.', $files[$i]));
                  
                try {    
                    Gallery::create([
                        'name' => (string) $image_name,
                        'image' => (string) $files[$i],
                        'place_id' => (int) $placeId,
                    ]);

                } catch(\Exception $err) {
                    Session::flash('error', $err->getMessage());
                    return false;
                }
            }
            Session::flash('success', 'Tạo địa điểm mới thành công');
        }
        
        return true;
    }

    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $get_full_image_name = $request->file('file')->getClientOriginalName();
                $image_name = current(explode('.', $get_full_image_name));
                $name = $image_name.rand(0, 99) . '.' . $request->file('file')->getClientOriginalExtension();

                $path_full = 'uploads/galleries';
                $request->file('file')->storeAs(
                    'public/' . $path_full, $name
                );

                return '/storage/' . $path_full . '/' . $name;

            } catch(\Exception $err) {
                return false;
            }
        }
    }

    public function destroy($request)
    {
        try {
            $path = str_replace('storage', 'public', $request->input('val'));
            Storage::delete($path);
            return true;
        } catch (\Exception $err){
            return false;
        }
        
    }
}

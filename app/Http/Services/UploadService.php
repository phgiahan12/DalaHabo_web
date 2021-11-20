<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $get_full_image_name = $request->file('file')->getClientOriginalName();
                $image_name = current(explode('.', $get_full_image_name));
                $name = $image_name.rand(0, 99) . '.' . $request->file('file')->getClientOriginalExtension();

                $path_full = 'uploads/sliders';
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

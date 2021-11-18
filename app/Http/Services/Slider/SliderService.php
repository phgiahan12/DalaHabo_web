<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function create($request)
    {
        try {
            $request->except("_token");
            Slider::create($request->input());
            Session::flash('success', 'Thêm slider mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function getAll()
    {
        return Slider::all();
    }

    public function count()
    {
        return Slider::count();
    }

    public function update($slider, $request)
    {
        try {
            $slider->fill($request->input());
            $slider->save();

            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $path = str_replace('storage', 'public', $slider->image);
            Storage::delete($path);
            return $slider->delete();
        }
        return false;
    }
    
}

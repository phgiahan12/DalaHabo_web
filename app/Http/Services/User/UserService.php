<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function getUser($request)
    {
        $result = User::where('email', $request->input('email'))->first();
        return $result;
    }

    public function getAll() 
    {   
        return User::with('role')->orderBy('id')->search()->paginate(10);
    }

    public function create($request) {
        try {
            User::create([
                'name' => (string) $request->input('name'),
                'phone' => (string) $request->input('phone'),
                'image' => (string) $request->input('image'),
                'email' => (string) $request->input('email'),
                'password' => (string) bcrypt($request->input('password')),
                'role_id' => (int) $request->input('role_id'),
            ]);
            return true;
        } catch (\Exception $err) {
            return false;
        }
    }

    public function update($user, $request)
    {
        $request->except("_token");
        try {
            $user->fill($request->input());
            $user->save();

            return true;
        } catch (\Exception $err) {
            return false;
        }
    }

    public function destroy($request)
    {
        $user = User::find($request->input('id'));
        if ($user) {
            try {
                $path = str_replace('storage', 'public', $user->image);
                Storage::delete($path);
                return $user->delete();
            } catch (\Exception $err) {
                return false;
            }
        }
        return false;
    }

    public function destroySelected($request)
    {
        $ids =  explode(',', $request->ids);
        $users = User::whereIn('id', $ids)->get();
        $length = count($users);

        if ($users) {
            try {
                for($i = 0; $i < $length; $i++) {
                    $path = str_replace('storage', 'public', $users[$i]->image);
                    Storage::delete($path);
                    $users[$i]->delete();
                }
                return true;
            } catch (\Exception $err) {
                return false;
            }
        }
        return false;
    }
}
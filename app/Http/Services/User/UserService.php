<?php

namespace App\Http\Services\User;

use App\Models\User;

class UserService
{
    public function getUsername($request)
    {
        $result = User::where('email', $request->input('email'))->first();
        return $result;
    }
}
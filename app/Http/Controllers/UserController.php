<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update_user(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request['name'];
        $user->email = $request['email'];

        $user->save();

        return true;
    }
}

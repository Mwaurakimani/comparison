<?php

namespace App\Http\Controllers;

use App\Models\watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WatchController extends Controller
{
    public function add_to_watch(Request $request)
    {
        $user = Auth::user();
        $product_url = $request['site_location'];

        $watch = new watch();

        $watch->user_id = $user->id;
        $watch->product_link = $product_url;

        $watch->save();

        return;
    }

    public function remove_item_from_watch(Request $request, $id)
    {
        $watch = watch::find($id);
        return $watch->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function add_preference(Request $request, $id): bool
    {
        $user = \App\Models\User::find($id);

        $pref_key = $request['data']['key'];
        $pref_option = $request['data']['option'];

        $user_preference = Preference::where('user_id',$user->id)->get();

        if(count($user_preference) > 0){
            $pref = $user_preference[0];
            $pref->key = $pref_key;
            $pref->option = $pref_option;
            $pref->save();

            return 1;
        }else{
            $preference = new \App\Models\Preference();

            $preference->user_id = $user->id;
            $preference->key = $pref_key;
            $preference->option = $pref_option;

            $preference->save();

            return true;
        }
    }
}

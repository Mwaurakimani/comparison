<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhoneController extends Controller
{
    public function add_phone(Request $request)
    {
        $phone = new Phone();

        $phone->name = $request['name'];
        $phone->dimensions = $request['dimensions'];
        $phone->weight = $request['weight'];
        $phone->size = $request['size'];
        $phone->resolution = $request['resolution'];
        $phone->ram = $request['ram'];
        $phone->storage = $request['storage'];
        $phone->front = $request['front'];
        $phone->back = $request['back'];

        if($request['avatar']){
            $file = $request->file('avatar');

            $filename = time().'_'.$file->getClientOriginalName();

            Storage::disk('phones')->putFileAs(
                '/',
                $file,
                $filename
            );

            $phone->photo = $filename;

        }

        $phone->save();

        return redirect()->route('phones');
    }

    public function update_phone(Request $request,$phone)
    {
        $phone = Phone::find($phone);

        $phone->name = $request['name'];
        $phone->dimensions = $request['dimensions'];
        $phone->weight = $request['weight'];
        $phone->size = $request['size'];
        $phone->resolution = $request['resolution'];
        $phone->ram = $request['ram'];
        $phone->storage = $request['storage'];
        $phone->front = $request['front'];
        $phone->back = $request['back'];

        if($request['avatar']){
            $file = $request->file('avatar');

            $filename = time().'_'.$file->getClientOriginalName();

            Storage::disk('phones')->putFileAs(
                '/',
                $file,
                $filename
            );

            $phone->photo = $filename;

        }

        $phone->save();


        return redirect()->route('phones');
    }

    public function fetch_phone(Request $request)
    {
        $term = $request['term'];

        $phones = Phone::where('name','LIKE',"%${term}%")->get();

        return($phones);
    }

    public function phone_selected(Request $request)
    {
        $phone = Phone::find($request['id']);

        return $phone;
    }
}

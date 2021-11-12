<?php

namespace App\Http\Controllers\Frontend\User;

use DB;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\videokeys;
use App\Models\videovalues2;
use App\Models\videos1;

class NewController extends Controller
{

    // public function index()
    // {
    //     $keys =videokeys::all();
    //     return response($keys,200);
    // }
    public function addvideo(Request $request)
    {

        $keys = new videos1;
        $keys->id = $request->id;
        $keys->video_name = $request->video_name;
        $keys->url = $request->url->store('VIDEO');
        $keys->duration=$request->duration;
        $keys->status=$request->status;
        $keys->created_at = $request->created_at;
        $keys->updated_at = $request->updated_at;
       $result= $keys->save();
        
        if ($result) {
            
            // $keys=videokeys::where('id',$id)->update($keys,$id);
            return ["result" => 'video  has been added'];
        } else {
            return ["result" => " video  has been failed"];
        }
        //  $keys=videokeys::create($keys);
        // return response($keys, 200);
    }

    // public function getkeys()
    // {
    //     // echo "test";
    //     // die();
    //     $keys = videokeys::all();
    //     return response($keys, 200);
    // }
    // public function updateKeys(Request $request, $id)
    // {
    //     $keys = videokeys::find($request->id);
    //     $keys->id = $request->id;
    //     $keys->keys = $request->keys;
    //     $keys->Types = $request->Types;
    //     $keys->created_at = $request->created_at;
    //     $keys->updated_at = $request->updated_at;
    //     $result = $keys->save();
    //     if ($result) {
    //         // $keys=videokeys::where('id',$id)->update($keys,$id);
    //         return ["result" => 'data has been updated'];
    //     } else {
    //         return ["result" => "update has been failed"];
    //     }
    // }
    // public function destroyKeys($id)
    // {
    //     $keys = videokeys::find($id);
    //     $keys->delete();
    //     return response('key deleted', 200);
    // }
}

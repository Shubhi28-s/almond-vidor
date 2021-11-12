<?php

namespace App\Http\Controllers\Frontend\User;

use DB;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\videokeys;
use App\Models\videos1;
use App\Models\demo;

class TypeController extends Controller
{

    // public function index()
    // {
    //     $keys =videokeys::all();
    //     return response($keys,200);
    // }
    // public function addvideo(Request $request)
    // {

    //     $keys = new demo;
    //     $keys->id = $request->id;
    //     $keys->video_name = $request->video_name;
    //     $keys->url = $request->url->store('VIDEO');
    //     $keys->updated_at = $request->updated_at;
    //    $result= $keys->save();

    //     if ($result) {
    //         // $keys=videokeys::where('id',$id)->update($keys,$id);
    //         return ["result" => 'video  has been added'];
    //     } else {
    //         return ["result" => " video  has been failed"];
    //     }
    //     //  $keys=videokeys::create($keys);
    //     // return response($keys, 200);
    // }


    public function addTypes(Request $request)
    {
        //  return $request->all();
        // //    echo "<pre>"; print_r($request->all()); echo "</pre>"; 
        //    die();


        $keys = $request->input('keys');
        $types = $request->input('types');
        $video_id = $request->input('video_id');



        $units = [];

        for ($i = 0; $i < count($request->input('keys')); $i++) {
            $units[] = [
                "keys" => $keys[$i],
                // "keys.* distinct"  => "required",

                "types" => $types[$i],
                "video_id" => $video_id[$i]
            ];
        };
        if (DB::table('demo')->insert($units)) {
            // //  return view(' frontend.viewVideo');
            return ["added"];
        }
        // else


    }

    public function getTypes()
    {


        // echo "test";
        // die();
        $keys = demo::all();
        return response($keys, 200);
    }

    public function getDuplicate()
    {
        $users = DB::table('demo')->get();
        foreach ($users as $key => $value) {
            $keyvalue = $value->keys;
            return $keyvalue;
        }
    }
    public function updateKeys(Request $request, $id)
    {
        $keys = videokeys::find($request->id);
        $keys->id = $request->id;
        $keys->keys = $request->keys;
        $keys->Types = $request->Types;
        $keys->created_at = $request->created_at;
        $keys->updated_at = $request->updated_at;
        $result = $keys->save();
        if ($result) {
            // $keys=videokeys::where('id',$id)->update($keys,$id);
            return ["result" => 'data has been updated'];
        } else {
            return ["result" => "update has been failed"];
        }
    }
    public function destroyKeys($id)
    {
        $keys = videokeys::find($id);
        $keys->delete();
        return response('key deleted', 200);
    }
    public function addValues(Request $request)
    {
        $values = new demo;
        $keys = $request->input('keys');
        //  $keys = implode(',', $request->keys);
        $types = $request->input('types');
        $video_id = $request->input('video_id');

        $user1 = demo::whereIn('keys', $keys)->pluck('keys')->count();
        if ($user1 > 0) {
            return ["It is already exist,Try for another one!!"];
        } else {

            $units = [];




            for ($i = 0; $i < count($request->input('keys')); $i++) {
                $units[] = [
                    "keys" => $keys[$i],
                    // "keys.* distinct"  => "required",

                    "types" => $types[$i],
                    "video_id" => $video_id[$i]
                ];
            };
        }
        if (DB::table('demo')->insert($units)) {
            // //  return view(' frontend.viewVideo');
            return ["added"];
        }
    }
    
}

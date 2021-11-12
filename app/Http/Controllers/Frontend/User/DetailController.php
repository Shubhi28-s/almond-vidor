<?php

namespace App\Http\Controllers\Frontend\User;

use DB;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\videokeys;
use App\Models\videos1;
use App\Models\demo;

class DetailController extends Controller
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


    public function addDetails(Request $request)
    {
        //  return $request->all();
        // //    echo "<pre>"; print_r($request->all()); echo "</pre>"; 
        //    die();


        $video_id = $request->input('video_id');
        // $video_details = $request->input('video_details');
        $video_name = $request->input('video_name');
        // $url = $request->input('url');
        $keys = $request->input('keys');
        // print_r($keys);
        // die();
        $types = $request->input('types');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $left = $request->input('left');
        $right = $request->input('right');
        $top = $request->input('top');
        $bottom = $request->input('bottom');
        $fontFamily = $request->input('fontFamily');
        $font_size = $request->input('font_size');
        $colors = $request->input('colors');
        $effect = $request->input('effect');
        $rotation = $request->input('rotation');
        $units = [];
//         print_r($keys);
//         print_r($types);
//         print_r($start_time);
//         print_r($end_time);
//         print_r("$keys");
//         print_r("$keys");

// die();
        for ($i = 0; $i < count($request->input('keys')); $i++) {
            $units[] = [
                "keys" => $keys[$i],
                "types" => $types[$i],
                "video_name" => $video_name[$i],
                // "url" => $url[$i],
                // "video_details" => $video_details[$i],
                "video_id" => $video_id[$i],
                "start_time" => $start_time[$i],
                "end_time" => $end_time[$i],
                "left" => $left[$i],
                "right" => $right[$i],
                "top" => $top[$i],
                "bottom" => $bottom[$i],
                // "width" => $width,
                // "height" => $height,
                // "text-align" => $textalign,
                "fontFamily" => $fontFamily[$i],
                "font_size" => $font_size[$i],
                "effect" => $effect[$i],
                "colors" => $colors[$i],
                "rotation" => $rotation[$i],
            ];
        };
        // print_r($units);
        // die();
        if (DB::table('demo')->insert($units)) {
            //  return view(' frontend.viewVideo');
            return ["added"];
        } else {
            return ["not added"];
        }
    }

    public function getDetails()
    {
        // echo "test";
        // die();

        
        $keys = demo::all();
        return response($keys, 200);
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
}

<?php

namespace App\Http\Controllers\Frontend\User;

use DB;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Models\videokeys;
// use App\Models\videovalues2;
use App\Models\videos1;
use App\Models\videovalues;

class MainController extends Controller
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
        // $keys = $request->input('video_id');
        $keys->video_name = $request->video_name;
        $file = $request->url;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->url->move('VIDEO', $filename);
        $keys->url = $filename;
        $keys->duration = $request->duration;
        $keys->status = $request->status;
        $keys->created_at = $request->created_at;
        $keys->updated_at = $request->updated_at;
        $result = $keys->save();
        $last3 = DB::table('my_videos')->latest('id')->first();
        if ($result) {

            // $keys=videokeys::where('id',$id)->update($keys,$id);
            return ["result" => 'video  has been added',"video_id"=>$keys->id ];
        } else {
            return ["result" => " video  has been failed"];
        }
        //  $keys=videokeys::create($keys);
        // return response($keys, 200);
    }
    public function updateVideo(Request $request, $id)
    {
        $keys = videos1::find($request->id);
        $keys->id = $request->id;
        $keys->video_name = $request->video_name;
        $keys->url = $request->url;
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

    public function getVideo()
    {
        // echo "test";
        // die();


        $keys = videos1::all();
        return response($keys, 200);
    }
    public function getVideoById($id)
    {
        $keys = videos1::where('id', $id)->get();
        return response($keys, 200);
    }

    public function deleteVideo($id)
    {
        $keys = videos1::find($id);
        $keys->delete();
    }
    public function addDetails(Request $request)
    {
        //  return $request->all();
        // //    echo "<pre>"; print_r($request->all()); echo "</pre>"; 
        //    die();


        $video_id = $request->input('video_id');
        // $video_details = $request->input('video_details');
        // $id=$request->input('id');
        $video_name = $request->input('video_name');
        $url = $request->file('url');
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
        for ($i = 0; $i < count($keys); $i++) {
            $name=$url[$i]->getClientOriginalName();
            $url[$i]->move('image',$name);
            $images[]=$name;
            $units[] = [
                // "id"=> $id[$i],
                "keys" => $keys[$i],
                "types" => $types[$i],
                "video_name" => $video_name[$i],
                "url" => $name,
                 "video_id" => $video_id[$i],
                "start_time" => $start_time[$i],
                "end_time" => $end_time[$i],
                "left" => $left[$i],
                "right" => $right[$i],
                "top" => $top[$i],
                "bottom" => $bottom[$i],
                "fontFamily" => $fontFamily[$i],
                "font_size" => $font_size[$i],
                "effect" => $effect[$i],
                "colors" => $colors[$i],
                "rotation" => $rotation[$i],
            ];
        };
        // print_r($units);
        // die();
        if (DB::table('videovalues1')->insert($units)) {
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
    
            
            $keys = videovalues::all();
            return response($keys, 200);
        }
    public function getDetailsById($id){
        $keys = videovalues::where('video_id', $id)->get();
        return response($keys, 200);
    }

    public function updateDetails(Request $request, $id){
        $keys = videovalues::find($request->id);
        $keys->id = $request->id;
        $keys->video_id = $request->video_id;
        $keys->start_time = $request->start_time;
        $keys->end_time = $request->end_time;
        $keys->left = $request->left;
        $keys->right = $request->right;
        $keys->top = $request->top;
        $keys->bottom = $request->bottom;
        $keys->fontFamily = $request->fontFamily;
        $keys->font_size = $request->font_size;
        $keys->effect = $request->effect;
        $keys->colors = $request->colors;
        $keys->rotation = $request->rotation;
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
    public function deleteDetails($id)
    {
        $keys = videovalues::find($id);
        $keys->delete();
    }
    public function insertGetId(){

    }
}

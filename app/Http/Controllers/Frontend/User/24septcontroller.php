<?php

namespace App\Http\Controllers\Frontend\User;

use DB;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Videovalues;
use App\Models\Videos1;

class FormController extends Controller
{
    public function addInfo()
    {
        return view("frontend.add-info");
    }

    public function storeInfo(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die();
        //    return $request->all();
        //     $videos_obj = new Videos;

        //     ///setting values
        //     $videos_obj->video_name = $request->video_name;
        //    // $info_obj->email = $request->email;
        //     $videos_obj->url = $request->file('url')->store('upload');
        //     $videos_obj->status = 1;

        //     /// save data
        //     $videos_obj->save();
        $videos = new Videovalues;
        // $videos->id= $request->id;

        $videos->video_name = $request->video_name;

        $file = $request->url;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->url->move('VIDEO', $filename);
        $videos->url = $filename;
        $videos->duration = $request->duration;
        $videos->video_id = $request->video_id;
        $videos->values = $request->values;
        $videos->keys = $request->keys;
        $videos->start_time = $request->start_time;
        $videos->end_time = $request->end_time;
        $videos->left = $request->left;
        $videos->right = $request->right;
        $videos->top = $request->top;
        $videos->bottom = $request->bottom;
        $videos->fontFamily = $request->fontFamily;
        $videos->font_size = $request->font_size;
        $videos->colors = $request->colors;
        $videos->rotation = $request->rotation;
        $videos->effect = $request->effect;
        $videos->created_at = $request->created_at;
        $videos->updated_at = $request->updated_at;

        // print_r(  $videos->desktop_view );

        // $videos->starttime = $request->starttime;
        // $videos->endtime = $request->endtime;
        // $videos->status = 1;
        $videos->save();
        // return redirect('frontend.show-list');
        return redirect('videos');
    }
    public function saveData(Request $request)
    {

        $videos = new Videos1;
        $videos->id = $request->id;
        $file = $request->url;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->url->move('VIDEO', $filename);
        $videos->url = $filename;
        $videos->video_name = $request->video_name;
        $videos->duration = $request->duration;
        // echo($request->duration);
        // die();
        $videos->status = 1;

        //  $videos->url = $request->file('url')->store('VIDEO');
        $videos->save();
        return redirect('show-list');
    }


    public function show(Videos1 $post)
    {
        $posts = Videos1::all();
        //  print_r($posts);
        //  die();
        return view('frontend.show-list', ['posts' => $posts]);
    }

    // public function embed($id)
    // {

    //     $posts = Videovalues::find($id);
    //     return view(' frontend.user.videos', compact('posts'));
    // }


    public function edit(Videos1 $post, $id)
    {
        $posts = Videos1::find($id);


        return view('frontend.user.edit-list', ['posts' => $posts]);
    }


    public function update(Request $request, Videos1 $post, $id)
    {
        $videos = Videos1::find($id);
        $videos->video_name = $request->get('video_name');
        //$posts->url=$request->get('url');
        // $posts->url = $request->file('url')->store('upload');
        $file = $request->url;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $request->url->move('VIDEO', $filename);
        $videos->url = $filename;
        $videos->duration = $request->duration;

        $videos->status = 1;
        $videos->save();
        // $posts->save();
        return redirect('show-list');
    }


    public function slide(Request $request)
    {

        //       return $request->all();
        // die();
        $video_name = $request->input('values');
        $slide_name = $request->input('keys');
        $starttime = $request->input('start_time');
        $endtime = $request->input('end_time');
        $left = $request->input('left');
        $right = $request->input('right');
        $top = $request->input('top');
        $bottom = $request->input('bottom');
        $fontfamily = $request->input('fontFamily');
        $fontSize = $request->input('font_size');
        $effect = $request->input('effect');
        $colors = $request->input('colors');
        $rotation = $request->input('rotation');

        $video_id = $request->input('video_id');
        $id = $request->input('id');
        // print_r($id);
        // die();
        for ($i = 0; $i < count($request->input('values')); $i++) {
            // print_r(count($request->input('values')));
            // die();
            // print_r($id[$i]);
            // die();
            if (!empty($video_name[$i])){

            
            $user1 =  VideoValues::find($id[$i]);
            // echo $user1;
            // die();

            if (!empty($user1)) {

                //update
                // echo "empty";
                $user2 =  VideoValues::where('id', $id[$i])
                    ->update([
                        'video_id'   => $video_id[$i],
                        "values" => $video_name[$i],
                        "keys" => $slide_name[$i],
                        "start_time" => $starttime[$i],
                        "end_time" => $endtime[$i],
                        "left" => $left[$i],
                        "right" => $right[$i],
                        "top" => $top[$i],
                        "bottom" => $bottom[$i],
                        "fontFamily" => $fontfamily[$i],
                        "font_size" => $fontSize[$i],
                        "effect" => $effect[$i],
                        "colors" => $colors[$i],
                        "rotation" => $rotation[$i],
                    ]);
            } else {
                //insert
                // echo "!empty";
                $user2 =  VideoValues::create([

                    'video_id'   => $video_id[$i],
                    "values" => $video_name[$i],
                    "keys" => $slide_name[$i],
                    "start_time" => $starttime[$i],
                    "end_time" => $endtime[$i],
                    "left" => $left[$i],
                    "right" => $right[$i],
                    "top" => $top[$i],
                    "bottom" => $bottom[$i],
                    "fontFamily" => $fontfamily[$i],
                    "font_size" => $fontSize[$i],
                    "effect" => $effect[$i],
                    "colors" => $colors[$i],
                    "rotation" => $rotation[$i],
                ]);
            }
        }

            //  return view(' frontend.viewVideo');
            //   return redirect('viewVideo/'.$video_id[$i]);


        }

        //  return redirect('viewVideo/'.$video_id[$i]);
        return redirect()->back();
    }


    public function Video($id)
    {
        //   print_r($_REQUEST);

        $posts = Videos1::find($id);
        //  $parts = Videos::all();
        $parts = Videovalues::where('video_id', $id)->get();

        //    print_r($parts);
        //     die();

        //  print_r($id);
        // die();
        return view('frontend.viewVideo', compact('posts', 'parts'));
        // return redirect('viewVideo',compact('posts','parts'));
    }


    public function Active($id)
    {
        $videos = Videos1::find($id)->update(['status' => 1]);

        return redirect('show-list');
    }
    public function InActive($id)
    {
        $posts = Videos1::find($id)->update(['status' => 0]);
        return redirect('show-list');
    }

    public function destroy(Videos1 $post, $id)
    {
        $post = Videos1::find($id);
        $post->delete();
        return redirect('show-list');
    }

    public function destroyValues(Videovalues $part, $id)
    {
        $part = Videovalues::find($id);
        $part->delete();
        return redirect()->back();
    }
}

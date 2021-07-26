<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Survey;
use App\Models\SurveySubmission;
use App\Models\Vingaje;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $models = Vingaje::orderBy('id', 'DESC')->get();

                $datatable = DataTables::of($models)->addColumn("operations", function ($row) {
                    return view('frontend.survey._partials.action', compact('row'));
                })->addIndexColumn();

                $datatable->rawColumns(['operations']);
                $datatable = $datatable->make(true);
                return $datatable;
            }
            return view('frontend.survey.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function create()
    {
        return view('frontend.survey.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'desktop_image' => 'required',
            'mobile_image' => 'required',
            'login_desktop_image' => 'required',
            'login_mobile_image' => 'required',
            'logo' => 'required',
            'video_url' => 'required',
            'first_popup' => 'required',
            'last_popup' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('error');
        }

        try {
            $user = new Vingaje();
            $user->user_id = Auth::id();
            $user->hexa_code = substr(sha1(time()), 0, 6);
            $user->first_popup = $request->get('first_popup');
            $user->last_popup = $request->get('last_popup');

            if (isset($request['desktop_image']) && !empty($request['desktop_image'])) {
                $file = $request['desktop_image'];
                $extension = $file->getClientOriginalExtension();
                $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                $user->desktop_image = env('Storage_path') . '/vingage/' . $filename;
            }
            if (isset($request['mobile_image']) && !empty($request['mobile_image'])) {
                $file = $request['mobile_image'];
                $extension = $file->getClientOriginalExtension();
                $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                $user->mobile_image = env('Storage_path') . '/vingage/' . $filename;
            }
            if (isset($request['login_desktop_image']) && !empty($request['login_desktop_image'])) {
                $file = $request['login_desktop_image'];
                $extension = $file->getClientOriginalExtension();
                $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                $user->login_desktop_image = env('Storage_path') . '/vingage/' . $filename;
            }
            if (isset($request['video_url']) && !empty($request['video_url'])) {
                $file = $request['video_url'];
                $extension = $file->getClientOriginalExtension();
                $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                $user->video_url = env('Storage_path') . '/vingage/' . $filename;
            }
            if (isset($request['login_mobile_image']) && !empty($request['login_mobile_image'])) {
                $file = $request['login_mobile_image'];
                $extension = $file->getClientOriginalExtension();
                $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                $user->login_mobile_image = env('Storage_path') . '/vingage/' . $filename;
            }
            if (isset($request['logo']) && !empty($request['logo'])) {
                $file = $request['logo'];
                $extension = $file->getClientOriginalExtension();
                $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                $user->logo = env('Storage_path') . '/vingage/' . $filename;
            }

            $user->save();

            return redirect()->route('frontend.user.survey.edit', $user->id)->withFlashSuccess('Survey is successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('Some thing went wrong:- ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $survey = Vingaje::whereId($id)->with('question')->first();
        return view('frontend.survey.edit', compact('survey'));
    }

    public function surveyCampaignInfo($id)
    {
        $survey = Vingaje::whereId($id)->first();
        return view('frontend.survey.createInfo', compact('survey'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            // 'access_category_id' => 'required',
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('error');
        }
        try {

            $survey = Vingaje::whereId($id)->first();

            if (isset($request->info) && $request->info == "info") {
                $survey->first_popup = $request->get('first_popup');
                $survey->last_popup = $request->get('last_popup');

                if (isset($request['desktop_image']) && !empty($request['desktop_image'])) {
                    $file = $request['desktop_image'];
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                    Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                    $survey->desktop_image = env('Storage_path') . '/vingage/' . $filename;
                }
                if (isset($request['mobile_image']) && !empty($request['mobile_image'])) {
                    $file = $request['mobile_image'];
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                    Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                    $survey->mobile_image = env('Storage_path') . '/vingage/' . $filename;
                }
                if (isset($request['login_desktop_image']) && !empty($request['login_desktop_image'])) {
                    $file = $request['login_desktop_image'];
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                    Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                    $survey->login_desktop_image = env('Storage_path') . '/vingage/' . $filename;
                }
                if (isset($request['video_url']) && !empty($request['video_url'])) {
                    $file = $request['video_url'];
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                    Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                    $survey->video_url = env('Storage_path') . '/vingage/' . $filename;
                }
                if (isset($request['login_mobile_image']) && !empty($request['login_mobile_image'])) {
                    $file = $request['login_mobile_image'];
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                    Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                    $survey->login_mobile_image = env('Storage_path') . '/vingage/' . $filename;
                }
                if (isset($request['logo']) && !empty($request['logo'])) {
                    $file = $request['logo'];
                    $extension = $file->getClientOriginalExtension();
                    $filename = str_replace(' ', '', str_replace('.', '', microtime())) . '.' . $extension;
                    Storage::disk('s3')->put('vingage/' . $filename, fopen($file, 'r+'), 'public');
                    $survey->logo = env('Storage_path') . '/vingage/' . $filename;
                }

                $survey->save();
            }

            if (!empty($request->data) && (count($request->data) > 0)) {
                foreach ($request->data as $video) {
                    if (!empty($video['question']) && !empty($video['answer'])) {
                        $links = Survey::updateOrCreate(
                            [
                                'id' => @$video['id'],
                            ],
                            [
                                'user_id' =>  Auth::id(),
                                'vingage_id' => $survey->id,
                                'hexa_code' => $survey->hexa_code,
                                'question' => $video['question'],
                                'answer' => $video['answer'],
                                'option_1' => $video['option_1'],
                                'option_2' => $video['option_2'],
                                'option_3' => $video['option_3'],
                                'option_4' => $video['option_4'],
                                'question_time' => $video['question_time'],
                                'time' => $video['time'],
                                'marks' => $video['marks'],
                            ]
                        );
                    }
                }
            }

            return redirect()->route('frontend.user.survey.edit', $id)->withFlashSuccess('Survey is successfully updated.');
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('Some thing went wrong:- ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = Vingaje::find($id);
            $user->question()->delete();
            $user->delete();
            return redirect()->back()->with('success', 'Survey has been deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Some Erros Found:- ' . $e->getMessage());
        }
    }


    public function addMoreQuestionAction(Request $request)
    {
        if ($request->ajax()) {
            $count = $request->get('count');
            $list = view('frontend.survey._partials.question')->with('count', $count)->render();
            return response()->json(['success' => true, 'question' => $list], 200);
        }
    }

    public function deleteSection(Request $request)
    {
        try {
            if (isset($request->id) && $request->type == 'question') {
                $user = Vingaje::whereId($request->id)->delete();
            }

            return redirect()->back()->withFlashSuccess('Data has been deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withFlashDanger('Some thing went wrong:- ' . $e->getMessage());
        }
    }

    public function surveySubmissionsAction(Request $request)
    {
        try {
            if ($request->ajax()) {
                $models = SurveySubmission::orderBy('id', 'DESC');

                $datatable = DataTables::eloquent($models)->addColumn("operations", function ($row) {
                    // return view('frontend.survey._partials.action', compact('row'));
                })->addIndexColumn();

                $datatable->rawColumns(['operations']);
                $datatable = $datatable->make(true);
                return $datatable;
            }


            // return  $models = SurveySubmission::with('delegate')->orderBy('id', 'DESC')->get();

            return view('frontend.survey.submission');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

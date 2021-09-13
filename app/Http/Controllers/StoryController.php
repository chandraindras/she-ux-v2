<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;
use DB;
use Validator;

class StoryController extends Controller
{
    public function index(Request $request, $idProject, $idStory)
    {
        $dataStory = Story::where('id_story', $idStory)->get();
        $projectName = DB::table('stories')
        					->join('projects', 'stories.id_project', '=', 'projects.id')
        					->where('stories.id_story', '=', $idStory)
        					->select('projects.project_name', 'projects.id')
        					->get();

        $listData = Story::where('id_project', $idProject)->get();
        return view('user_story', compact('dataStory', 'listData', 'projectName'));
    }

    public function store(Request $request, $id)
    {
        $story = Story::where('id_project', $id)->first();

        if(is_null($story['id_project'])){
            Story::create([
                'id_project' => $id,
                'story_name' => request('story_name')
            ]);

            $idStory = Story::select('id_story', 'id_project')->where('id_project', $id)->first();

            return redirect()->route('story', [$idStory['id_project'], $idStory['id_story']]);
        } else {
            return redirect()->back()->with('error', 'You Already Have User Story ! You can only create one User Story in each project !');
        }
    }

    public function addData(Request $request, $id)
    {
    	$cekDataStory = Story::where('id_project', $id)->first();
        $story = Story::where('id_project', $id);

        if(is_null($cekDataStory->as_a)){
            $story->update([
                'as_a' => $request->input('as_a'),
                'i_want' => $request->input('i_want'),
                'so_that' => $request->input('so_that')
            ]);
        } else {
    	   Story::create ([ 
            'id_project' => $request->input('id_project'),
            'story_name' => $request->input('story_name'),
            'as_a' => $request->input('as_a'),
            'i_want' => $request->input('i_want'),
            'so_that' => $request->input('so_that')
           ]);
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        if($request->isMethod('post')){
            $lama = Story::where('id_story', $id);
            $baru = $request->only([
                'as_a',
                'i_want',
                'so_that',
            ]);
            Validator::make($baru, [
                'as_a' => 'required',
                'i_want' => 'required',
                'so_that' => 'required'
            ])->validate();
            $lama->update([
                'as_a' => $request->input('as_a'),
                'i_want' => $request->input('i_want'),
                'so_that' => $request->input('so_that')
            ]);
            return redirect()->back();
        }
    }

    public function delete(Request $request, $id)
    {
        $lists = Story::where('id_story', $id)->delete();
        return redirect()->back();
    }

}

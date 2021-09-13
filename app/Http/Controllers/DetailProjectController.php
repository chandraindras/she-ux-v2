<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Swot;
use App\Story;
use App\Project_statement;
use App\Lean;
use App\Comparison;
use App\User_persona;
use DB;

class DetailProjectController extends Controller
{
    public function index(Request $request, $id)
    {
    	$dataProject = Project::where('id', $id)->get();
    	$dataSwot = Swot::where('id_project', $id)->get();
    	$cekJumlahSwot = Swot::where('id_project', $id)->count();
    	$dataStory = DB::table('stories')
                         ->select(['id_story', 'id_project', 'story_name', 'created_at'])
                        ->where('id_project', '=', $id)
                        ->groupBy('id_project')
                        ->get();
    	$cekJumlahStory = Story::where('id_project', $id)->count();
        $dataProjectStatement = Project_statement::where('id_project', $id)->get();
        $cekJumlahPStatement = Project_statement::where('id_project', $id)->count();
        $dataLean = Lean::where('id_project', $id)->get();
        $cekJumlahLean = Lean::where('id_project', $id)->count();
        $dataComparison =DB::table('comparisons')
                                ->select(['id_comparison', 'id_project', 'comparison_name', 'created_at'])
                                ->where('id_project', '=', $id)
                                ->groupBy('id_project')
                                ->get();
        $cekJumlahComparison = Comparison::where('id_project', $id)->count();
        $dataPersona = User_persona::where('id_project', $id)->get();
        $cekJumlahPersona = User_persona::where('id_project', $id)->count();
    	return view('detailproject', compact('dataProject', 'dataSwot', 'cekJumlahSwot', 'dataStory', 'cekJumlahStory', 'dataProjectStatement', 'cekJumlahPStatement', 'dataLean', 'cekJumlahLean', 'dataComparison', 'cekJumlahComparison', 'dataPersona', 'cekJumlahPersona'));
    }

    public function editSwotName(Request $request, $id)
    {
    	$swot = Swot::where('id_swot', $id);
    	$dataBaru = $request->only([
	    	'swot_name',
	    ]);
    	$swot->update([
    		'swot_name' => $request->input('swot_name')
    	]);
    	
    	return redirect()->back();
    }

    public function deleteSwotName(Request $request, $id)
    {
        $swot = Swot::where('id_swot', $id)->delete();
        return redirect()->back();
    }

    public function editPersonaName(Request $request, $id)
    {
        $persona = User_persona::where('id_persona', $id);
        $dataBaru = $request->only([
            'persona_name',
        ]);
        $persona->update([
            'persona_name' => $request->input('persona_name')
        ]);
        
        return redirect()->back();
    }

    public function editLeanName(Request $request, $id)
    {
        $lean = Lean::where('id_lean', $id);
        $dataBaru = $request->only([
            'lean_name',
        ]);
        $lean->update([
            'lean_name' => $request->input('lean_name')
        ]);
        
        return redirect()->back();
    }

    public function editPstatementName(Request $request, $id)
    {
        $project_statement = Project_statement::where('id_project_statement', $id);
        $dataBaru = $request->only([
            'project_statement_name',
        ]);
        $project_statement->update([
            'project_statement_name' => $request->input('project_statement_name')
        ]);
        
        return redirect()->back();
    }

    public function editComparisonName(Request $request, $id)
    {
        $comparison = Comparison::where('id_comparison', $id);
        $dataBaru = $request->only([
            'comparison_name',
        ]);
        $comparison->update([
            'comparison_name' => $request->input('comparison_name')
        ]);
        
        return redirect()->back();
    }

    public function editStoryName(Request $request, $id)
    {
        $story = Story::where('id_story', $id);
        $dataBaru = $request->only([
            'story_name',
        ]);
        $story->update([
            'story_name' => $request->input('story_name')
        ]);
        
        return redirect()->back();
    }

    public function deletePersonaName(Request $request, $id)
    {
        $persona = User_persona::where('id_persona', $id)->delete();
        return redirect()->back();
    }

    public function deleteLeanName(Request $request, $id)
    {
        $lean = Lean::where('id_lean', $id)->delete();
        return redirect()->back();
    }

    public function deletePstatementName(Request $request, $id)
    {
        $roject_statement = Project_statement::where('id_project_statement', $id)->delete();
        return redirect()->back();
    }

    public function deleteComparisonName($id)
    {
        $comparison = Comparison::where('id_project', $id)->delete();
        return redirect()->back();
    }

    public function deleteStoryName($id)
    {
        $atory = Story::where('id_project', $id)->delete();
        return redirect()->back();
    }
}

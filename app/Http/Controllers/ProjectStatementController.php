<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_statement;
use DB;

class ProjectStatementController extends Controller
{
    public function index(Request $request, $id)
    {
        $dataProjectStatement = Project_statement::where('id_project_statement', $id)->get();
        $projectName = DB::table('project_statements')
        					->join('projects', 'project_statements.id_project', '=', 'projects.id')
        					->where('project_statements.id_project_statement', '=', $id)
        					->select('projects.project_name', 'projects.id')
        					->get();
        return view('project_statement', compact('dataProjectStatement', 'projectName'));
    }

    public function store(Request $request, $id)
    {
        $projectStatement = Project_statement::where('id_project', $id)->first();

        if(is_null($projectStatement['id_project'])){
            Project_statement::create([
                'id_project' => $id,
                'project_statement_name' => request('project_statement_name')
            ]);

            $idProjectStatement = Project_statement::select('id_project_statement')->where('id_project', $id)->first();

            return redirect()->route('project_statement', [$idProjectStatement['id_project_statement']]);
        } else {
            return redirect()->back()->with('error', 'You Already Have Project Statement ! You can only create one in each project !');
        }
    }

    public function addData(Request $request, $id)
    {
    	$scope = implode('+', $request->input('scope'));
    	$deliverable = implode('+', $request->input('deliverable'));
    	$criteria = implode('+', $request->input('criteria'));
    	$constraint = implode('+', $request->input('constraint'));
    	$asumption = implode('+', $request->input('asumption'));

    	$projectStatement = Project_statement::where('id_project_statement', $id);

    	$projectStatement->update([
    		'project_sponsor' => $request->input('project_sponsor'),
    		'project_manager' => $request->input('project_manager'),
    		'date_approval' => $request->input('date_approval'),
    		'date_revisian' => $request->input('last_revisian'),
    		'scope' => $scope,
    		'deliverable' => $deliverable,
    		'acceptance' => $criteria,
    		'constraint' => $constraint,
    		'assumption' => $asumption
    	]);

    	return redirect()->route('pstatement_update_view', [$id]);
    }

    public function toUpdatePage(Request $request, $id)
    {
    	$cekProjectStatement = Project_statement::where('id_project_statement', $id)->first();

        if(is_null($cekProjectStatement->scope)) {
            return redirect()->route('project_statement', [$id]);
        } else {
           $dataProjectStatement = Project_statement::where('id_project_statement', $id)->get();
           $projectName = DB::table('project_statements')
                            ->join('projects', 'project_statements.id_project', '=', 'projects.id')
                            ->where('project_statements.id_project_statement', '=', $id)
                            ->select('projects.project_name', 'projects.id')
                            ->get();

            return view('project_statement_update', compact('dataProjectStatement', 'projectName')); 
        }
        
    }

    public function editData(Request $request, $id)
    {
        $projectStatement = Project_statement::where('id_project_statement', $id);

        $projectStatement->update([
            'project_statement_name' => $request->input('project_name'),
            'project_sponsor' => $request->input('project_sponsor'),
            'project_manager' => $request->input('project_manager'),
            'date_approval' => $request->input('date_approval'),
            'date_revisian' => $request->input('last_revisian')
        ]);

        return redirect()->back()->with('success', 'Data has been changed succesfully !');
    }

    public function addScope(Request $request, $id)
    {
        $projectStatement = Project_statement::where('id_project_statement', $id);
        $cekDataScope = Project_statement::select('scope')->where('id_project_statement', $id)->first();

        $scope = implode('+', $request->input('scope'));
        if (is_null($cekDataScope->scope)) {
            $projectStatement->update([
                'scope' => $scope
            ]);
        } else {
            $projectStatement->update([
                'scope' => $cekDataScope->scope.'+'.$scope
            ]);
        }

        return redirect()->back();
    }

    public function editScope(Request $request, $idArray, $idProjectStatement)
    {
        $dataBaru = $request->get('scope');
        $projectStatement = Project_statement::where('id_project_statement', $idProjectStatement)->first();
        $data = $projectStatement->scope;
        $array= explode('+', $data);
        
        foreach ($array as $key => $value) {
            if($key == $idArray){
                $array[$key] = $dataBaru;
                continue;
            }
        }

        $string = implode('+', $array);
 
        $newData = Project_statement::where('id_project_statement', $idProjectStatement);
        $newData->update([
            'scope' => $string
        ]);

        return redirect()->back();
    }

    public function editDeliverable(Request $request, $idArray, $idProjectStatement)
    {
        $dataBaru = $request->get('deliverable');
        $projectStatement = Project_statement::where('id_project_statement', $idProjectStatement)->first();
        $data = $projectStatement->deliverable;
        $array= explode('+', $data);
        
        foreach ($array as $key => $value) {
            if($key == $idArray){
                $array[$key] = $dataBaru;
                continue;
            }
        }

        $string = implode('+', $array);
 
        $newData = Project_statement::where('id_project_statement', $idProjectStatement);
        $newData->update([
            'deliverable' => $string
        ]);

        return redirect()->back();
    }

    public function editCriteria(Request $request, $idArray, $idProjectStatement)
    {
        $dataBaru = $request->get('criteria');
        $projectStatement = Project_statement::where('id_project_statement', $idProjectStatement)->first();
        $data = $projectStatement->acceptance;
        $array= explode('+', $data);
        
        foreach ($array as $key => $value) {
            if($key == $idArray){
                $array[$key] = $dataBaru;
                continue;
            }
        }

        $string = implode('+', $array);
 
        $newData = Project_statement::where('id_project_statement', $idProjectStatement);
        $newData->update([
            'acceptance' => $string
        ]);

        return redirect()->back();
    }

    public function editConstraint(Request $request, $idArray, $idProjectStatement)
    {
        $dataBaru = $request->get('constraint');
        $projectStatement = Project_statement::where('id_project_statement', $idProjectStatement)->first();
        $data = $projectStatement->constraint;
        $array= explode('+', $data);
        
        foreach ($array as $key => $value) {
            if($key == $idArray){
                $array[$key] = $dataBaru;
                continue;
            }
        }

        $string = implode('+', $array);
 
        $newData = Project_statement::where('id_project_statement', $idProjectStatement);
        $newData->update([
            'constraint' => $string
        ]);

        return redirect()->back();
    }

    public function editAssumption(Request $request, $idArray, $idProjectStatement)
    {
        $dataBaru = $request->get('asumption');
        $projectStatement = Project_statement::where('id_project_statement', $idProjectStatement)->first();
        $data = $projectStatement->assumption;
        $array= explode('+', $data);
        
        foreach ($array as $key => $value) {
            if($key == $idArray){
                $array[$key] = $dataBaru;
                continue;
            }
        }

        $string = implode('+', $array);
 
        $newData = Project_statement::where('id_project_statement', $idProjectStatement);
        $newData->update([
            'assumption' => $string
        ]);

        return redirect()->back();
    }
}

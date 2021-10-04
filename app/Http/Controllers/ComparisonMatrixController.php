<?php

namespace App\Http\Controllers;

use App\Swot;
use Illuminate\Http\Request;
use Validator;
use App\Project;
use DB;
use App\Comparison;
use Illuminate\Support\Facades\Auth;
use PDF;

class ComparisonMatrixController extends Controller
{
    public function index(Request $request, $id)
    {
    	$dataComparison = Comparison::where('id_project', $id)->first();
    	$projectName = Project::where('id', $id)->first();
        $countComparison = Comparison::where('id_project', $id)->count();
        $dataProject = Project::where('email_user','=',Auth::user()->email)->where('id', $id)->get();

        if ($countComparison == 1){
            return view('comparison-matrix', compact('projectName','dataProject', 'dataComparison'));
        } else {
            return redirect()->route('comparison_matrix_result', [$id]);
        }
    }

    public function print(Request $request, $id)
    {
        $dataComparison = Comparison::where('id_project', $id)->first();
        $projectName = Project::where('id', $id)->first();
        $countComparison = Comparison::where('id_project', $id)->count();
        $dataProject = Project::where('email_user','=',Auth::user()->email)->where('id', $id)->get();
        $data = [
            'dataComparison'=>$dataComparison, 'projectName'=>$projectName, 'countComparison'=>$countComparison, '$dataProject'=>$dataProject
        ];
//        dd($dataProject);

        $pdf = PDF::loadview('v2.export.comparison_matrix_pdf',$data);
        return $pdf->download('comparison_matrix.pdf');
    }

    public function store(Request $request, $id)
    {
    	$comparison = Comparison::where('id_project', $id)->first();

        if(is_null($comparison['id_project'])){
            Comparison::create([
                'id_project' => $id,
                'comparison_name' => request('comparison_name')
            ]);
            return redirect()->route('comparison_matrix', [$id]);
        } else {
            return redirect()->back()->with('error', 'You Already Have Comparison Matrix ! You can only create one Comparison Matrix in each project !');
        }
    }

    public function addCompetitor(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$cekDataCompetitor = Comparison::where('id', $id);
        	$competitor = Comparison::select('competitor1')->where('id', $id)->first();

    		if(is_null($competitor->competitor1)){
	            $cekDataCompetitor->update([
	                'aspect' => $request->input('aspect'),
	                'competitor1' => $request->input('competitor1'),
	                'competitor2' => $request->input('competitor2'),
	                'competitor3' => $request->input('competitor3'),
	                'competitor4' => $request->input('competitor4'),
	                'competitor5' => $request->input('competitor5')
	            ]);
	        }
    	}
    }

    public function addMorePost(Request $request, $idProject)
    {
        $request->validate([
            'addmore.*.aspect' => 'required',
            'addmore.*.competitor1' => 'required',
            'addmore.*.competitor2' => 'required',
            'addmore.*.competitor3' => 'required',
        ]);

        foreach ($request->addmore as $key => $value) {
            Comparison::create($value);
        }

        return redirect()->route('comparison_matrix_result', [$idProject]);
    }

    public function editMorePost(Request $request, $idProject)
    {
        foreach($request->get('updatemore', []) as $member) {
            DB::table('comparisons')->where('id_comparison', $member['id_comparison'])
                ->update($member);
        }

        foreach ($request->addmore as $key => $value) {
            Comparison::create($value);
        }
        return redirect()->route('comparison_matrix_result', [$idProject]);
    }

    public function delete(Request $request, $id)
    {
        $lists = Comparison::where('id_comparison', $id)->delete();
        return response()->json(['status'=>'Data deleted successfully']);
    }

    public function comparisonResult(Request $request, $id)
    {
    	$dataComparison = Comparison::where('id_project', $id)->first();
    	$projectName = Project::where('id', $id)->first();
    	$listComparison = Comparison::where('id_project', $id)->where('id_comparison', '!=', '$comparisonName[id_comparison]')->get();
        $dataProject = Project::where('email_user','=',Auth::user()->email)->where('id', $id)->get();
    	return view('comparison-matrix-result', compact('listComparison','dataProject', 'projectName', 'dataComparison'));
    }

    public function exportPdf(Request $request, $id)
    {
        $dataComparison = Comparison::where('id_project', $id)->first();
        $projectName = Project::where('id', $id)->first();
        $listComparison = Comparison::where('id_project', $id)->where('id_comparison', '!=', '$comparisonName[id_comparison]')->get();
        $pdf = PDF::loadview('comparison-pdf',compact('listComparison'));
        // return $pdf->setPaper('a4', 'portrait')->stream('comparison_matrix.pdf');
        return $pdf->stream('comparison-matrix.pdf');
        set_time_limit(300);
    }
}

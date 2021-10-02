<?php

namespace App\Http\Controllers;

use App\Swot;
use Illuminate\Http\Request;
use Validator;
use App\Project;
use DB;
use Illuminate\Support\Facades\Auth;

class SwotController extends Controller
{
    public function index(Request $request, $id)
    {
        $dataSwot = Swot::where('id_swot', $id)->get();
        $projectName = DB::table('swots')
        					->join('projects', 'swots.id_project', '=', 'projects.id')
        					->where('swots.id_swot', '=', $id)
        					->select('projects.project_name', 'projects.id')
        					->get();

        return view('swot', compact('dataSwot', 'projectName'));
    }

    public function cetak(Request $request, $id)
    {
        $dataSwot = Swot::where('id_swot', $id)->get();
        $projectName = DB::table('swots')
            ->join('projects', 'swots.id_project', '=', 'projects.id')
            ->where('swots.id_swot', '=', $id)
            ->select('projects.project_name', 'projects.id')
            ->get();
        $pdf = PDF::loadview('swot_pdf',['dataSwot'=>$dataSwot, 'prjectName'=>$projectName]);
        return $pdf->download('swot-pdf');
    }

    public function store(Request $request, $id)
    {
        $swot = Swot::where('id_project', $id)->first();

        if(is_null($swot['id_project'])){
            Swot::create([
                'id_project' => $id,
                'swot_name' => request('swot_name')
            ]);

            $idSwot = Swot::select('id_swot')->where('id_project', $id)->first();

            return redirect()->route('swot', [$idSwot['id_swot']]);
        } else {
            return redirect()->back()->with('error', 'You Already Have SWOT ! You can only create one SWOT in each project !');
        }
    }

    public function addStrength(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$swot = Swot::where('id_swot', $id);
    		$dataLama = Swot::select('strength')->where('id_swot', $id)->first();
    		$dataBaru = $request->only([
	    			'strength',
	    	]);

    		if(is_null($dataLama->strength)){
    			$swot->update([
    				'strength' => $request->input('strength')
    			]);
    		} else {
	    		$swot->update([
	    			'strength' => $dataLama->strength.'+'.$request->input('strength')
	    		]);
    		}

    		return redirect()->back();
    	}
    }

    public function destroyStrength(Request $request, $idArray, $idSwot)
    {
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->strength;
    	$array= explode('+', $data);

    	unset($array[$idArray]);
		$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'strength' => $string
    	]);

    	return redirect()->back();
    }

    public function editStrength(Request $request, $idArray, $idSwot)
    {
    	$dataBaru = $request->get('strength');
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->strength;
    	$array= explode('+', $data);

    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'strength' => $string
    	]);

    	return redirect()->back();
    }

    public function addWeakness(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$swot = Swot::where('id_swot', $id);
    		$dataLama = Swot::select('weakness')->where('id_swot', $id)->first();
    		$dataBaru = $request->only([
	    			'weakness',
	    	]);

    		if(is_null($dataLama->weakness)){
    			$swot->update([
    				'weakness' => $request->input('weakness')
    			]);
    		} else {
	    		$swot->update([
	    			'weakness' => $dataLama->weakness.'+'.$request->input('weakness')
	    		]);
    		}

    		return redirect()->back();
    	}
    }

    public function destroyWeakness(Request $request, $idArray, $idSwot)
    {
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->weakness;
    	$array= explode('+', $data);

    	unset($array[$idArray]);
		$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'weakness' => $string
    	]);

    	return redirect()->back();
    }

    public function editWeakness(Request $request, $idArray, $idSwot)
    {
    	$dataBaru = $request->get('weakness');
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->weakness;
    	$array= explode('+', $data);

    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'weakness' => $string
    	]);

    	return redirect()->back();
    }

    public function addOpportunity(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$swot = Swot::where('id_swot', $id);
    		$dataLama = Swot::select('opportunity')->where('id_swot', $id)->first();
    		$dataBaru = $request->only([
	    			'opportunity',
	    	]);

    		if(is_null($dataLama->opportunity)){
    			$swot->update([
    				'opportunity' => $request->input('opportunity')
    			]);
    		} else {
	    		$swot->update([
	    			'opportunity' => $dataLama->opportunity.'+'.$request->input('opportunity')
	    		]);
    		}

    		return redirect()->back();
    	}
    }

    public function destroyOpportunity(Request $request, $idArray, $idSwot)
    {
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->opportunity;
    	$array= explode('+', $data);

    	unset($array[$idArray]);
		$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'opportunity' => $string
    	]);

    	return redirect()->back();
    }

    public function editOpportunity(Request $request, $idArray, $idSwot)
    {
    	$dataBaru = $request->get('opportunity');
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->opportunity;
    	$array= explode('+', $data);

    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'opportunity' => $string
    	]);

    	return redirect()->back();
    }
    public function addThreat(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$swot = Swot::where('id_swot', $id);
    		$dataLama = Swot::select('threat')->where('id_swot', $id)->first();
    		$dataBaru = $request->only([
	    			'threat',
	    	]);

    		if(is_null($dataLama->threat)){
    			$swot->update([
    				'threat' => $request->input('threat')
    			]);
    		} else {
	    		$swot->update([
	    			'threat' => $dataLama->threat.'+'.$request->input('threat')
	    		]);
    		}

    		return redirect()->back();
    	}
    }

    public function destroyThreat(Request $request, $idArray, $idSwot)
    {
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->threat;
    	$array= explode('+', $data);

    	unset($array[$idArray]);
		$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'threat' => $string
    	]);

    	return redirect()->back();
    }

    public function editThreat(Request $request, $idArray, $idSwot)
    {
    	$dataBaru = $request->get('threat');
    	$swot = Swot::where('id_swot', $idSwot)->first();
    	$data = $swot->threat;
    	$array= explode('+', $data);

    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);

    	$newData = Swot::where('id_swot', $idSwot);
    	$newData->update([
    		'threat' => $string
    	]);

    	return redirect()->back();
    }
}

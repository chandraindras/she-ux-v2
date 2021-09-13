<?php

namespace App\Http\Controllers;

use App\Lean;
use Illuminate\Http\Request;
use Validator;
use App\Project;
use DB;

class LeanCanvasController extends Controller
{
    public function index(Request $request, $id)
    {
    	$dataLean = Lean::where('id_lean', $id)->get();
    	$projectName = DB::table('leans')
    						->join('projects', 'leans.id_project', '=', 'projects.id')
    						->where('leans.id_lean', '=', $id)
    						->select('projects.project_name', 'projects.id')
    						->get();
    	return view('lean_canvas', compact('dataLean', 'projectName'));
    }

    public function store(Request $request, $id)
    {
    	$lean = Lean::where('id_project', $id)->first();

        if(is_null($lean['id_project'])){
            Lean::create([
                'id_project' => $id,
                'lean_name' => request('lean_name')
            ]);

            $idLean = Lean::select('id_lean')->where('id_project', $id)->first();

            return redirect()->route('lean_canvas', [$idLean['id_lean']]);
        } else {
            return redirect()->back()->with('error', 'You Already Have Lean Canvas ! You can only create one Lean Canvas in each project !');
        }
    }

    public function addProblem(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('problem')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'problem',
	    	]);

    		if(is_null($dataLama->problem)){
    			$lean->update([
    				'problem' => $request->input('problem')
    			]);
    		} else {
	    		$lean->update([
	    			'problem' => $dataLama->problem.'+'.$request->input('problem')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addExistingAlternative(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('existing_alternative')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'existing_alternative',
	    	]);

    		if(is_null($dataLama->existing_alternative)){
    			$lean->update([
    				'existing_alternative' => $request->input('existing_alternative')
    			]);
    		} else {
	    		$lean->update([
	    			'existing_alternative' => $dataLama->existing_alternative.'+'.$request->input('existing_alternative')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addSolution(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('solution')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'solution',
	    	]);

    		if(is_null($dataLama->solution)){
    			$lean->update([
    				'solution' => $request->input('solution')
    			]);
    		} else {
	    		$lean->update([
	    			'solution' => $dataLama->solution.'+'.$request->input('solution')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addKeyMetric(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('key_metric')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'key_metric',
	    	]);

    		if(is_null($dataLama->key_metric)){
    			$lean->update([
    				'key_metric' => $request->input('key_metric')
    			]);
    		} else {
	    		$lean->update([
	    			'key_metric' => $dataLama->key_metric.'+'.$request->input('key_metric')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addUniqueValuePreposition(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('unique_value')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'unique_value',
	    	]);

    		if(is_null($dataLama->unique_value)){
    			$lean->update([
    				'unique_value' => $request->input('unique_value')
    			]);
    		} else {
	    		$lean->update([
	    			'unique_value' => $dataLama->unique_value.'+'.$request->input('unique_value')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addHighLevelConcept(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('high_level_concept')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'high_level_concept',
	    	]);

    		if(is_null($dataLama->high_level_concept)){
    			$lean->update([
    				'high_level_concept' => $request->input('high_level_concept')
    			]);
    		} else {
	    		$lean->update([
	    			'high_level_concept' => $dataLama->high_level_concept.'+'.$request->input('high_level_concept')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addUnfairAdvantage(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('unfair_advantage')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'unfair_advantage',
	    	]);

    		if(is_null($dataLama->unfair_advantage)){
    			$lean->update([
    				'unfair_advantage' => $request->input('unfair_advantage')
    			]);
    		} else {
	    		$lean->update([
	    			'unfair_advantage' => $dataLama->unfair_advantage.'+'.$request->input('unfair_advantage')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addChannel(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('channel')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'channel',
	    	]);

    		if(is_null($dataLama->channel)){
    			$lean->update([
    				'channel' => $request->input('channel')
    			]);
    		} else {
	    		$lean->update([
	    			'channel' => $dataLama->channel.'+'.$request->input('channel')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addCustomerSegment(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('customer_segment')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'customer_segment',
	    	]);

    		if(is_null($dataLama->customer_segment)){
    			$lean->update([
    				'customer_segment' => $request->input('customer_segment')
    			]);
    		} else {
	    		$lean->update([
	    			'customer_segment' => $dataLama->customer_segment.'+'.$request->input('customer_segment')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addEarlyAdopter(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('early_adopter')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'early_adopter',
	    	]);

    		if(is_null($dataLama->early_adopter)){
    			$lean->update([
    				'early_adopter' => $request->input('early_adopter')
    			]);
    		} else {
	    		$lean->update([
	    			'early_adopter' => $dataLama->early_adopter.'+'.$request->input('early_adopter')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addCostStructure(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('cost_structure')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'cost_structure',
	    	]);

    		if(is_null($dataLama->cost_structure)){
    			$lean->update([
    				'cost_structure' => $request->input('cost_structure')
    			]);
    		} else {
	    		$lean->update([
	    			'cost_structure' => $dataLama->cost_structure.'+'.$request->input('cost_structure')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function addRevenueStream(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$lean = Lean::where('id_lean', $id);
    		$dataLama = Lean::select('revenue_stream')->where('id_lean', $id)->first();
    		$dataBaru = $request->only([
	    			'revenue_stream',
	    	]);

    		if(is_null($dataLama->revenue_stream)){
    			$lean->update([
    				'revenue_stream' => $request->input('revenue_stream')
    			]);
    		} else {
	    		$lean->update([
	    			'revenue_stream' => $dataLama->revenue_stream.'+'.$request->input('revenue_stream')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }
}

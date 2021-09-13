<?php

namespace App\Http\Controllers;

use App\Lean;
use Illuminate\Http\Request;
use Validator;
use App\Project;
use DB;

class EditLeanController extends Controller
{
    public function editProblem(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('problem');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->problem;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'problem' => $string
    	]);

    	return redirect()->back();
    }

    public function editExisting(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('existing_alternative');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->existing_alternative;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'existing_alternative' => $string
    	]);

    	return redirect()->back();
    }

    public function editSolution(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('solution');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->solution;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'solution' => $string
    	]);

    	return redirect()->back();
    }

    public function editKeyMetric(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('key_metric');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->key_metric;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'key_metric' => $string
    	]);

    	return redirect()->back();
    }

    public function editUvp(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('unique_value');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->unique_value;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'unique_value' => $string
    	]);

    	return redirect()->back();
    }

    public function editHlc(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('high_level_concept');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->high_level_concept;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'high_level_concept' => $string
    	]);

    	return redirect()->back();
    }

    public function editUnfairAdvantage(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('unfair_advantage');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->unfair_advantage;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'unfair_advantage' => $string
    	]);

    	return redirect()->back();
    }

    public function editChannel(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('channel');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->channel;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'channel' => $string
    	]);

    	return redirect()->back();
    }

    public function editCustomerSegment(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('customer_segment');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->customer_segment;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'customer_segment' => $string
    	]);

    	return redirect()->back();
    }

    public function editEarlyAdopter(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('early_adopter');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->early_adopter;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'early_adopter' => $string
    	]);

    	return redirect()->back();
    }

    public function editCostStructure(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('cost_structure');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->cost_structure;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'cost_structure' => $string
    	]);

    	return redirect()->back();
    }

    public function editRevenueStream(Request $request, $idArray, $idLean)
    {
    	$dataBaru = $request->get('revenue_stream');
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->revenue_stream;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'revenue_stream' => $string
    	]);

    	return redirect()->back();
    }
}

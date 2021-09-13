<?php

namespace App\Http\Controllers;

use App\Lean;
use Illuminate\Http\Request;
use Validator;
use App\Project;
use DB;


class DeleteLeanController extends Controller
{
    public function destroyProblem(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->problem;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'problem' => $string
    	]);

    	return redirect()->back();
    }

    public function destroySolution(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->solution;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'solution' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyUvp(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->unique_value;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'unique_value' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyUnfairAdvantage(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->unfair_advantage;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'unfair_advantage' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyCustomerSegment(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->customer_segment;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'customer_segment' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyExisting(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->existing_alternative;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'existing_alternative' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyKeyMetric(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->key_metric;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'key_metric' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyHlc(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->high_level_concept;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'high_level_concept' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyChannel(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->channel;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'channel' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyEarlyAdopter(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->early_adopter;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'early_adopter' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyCostStructure(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->cost_structure;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'cost_structure' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyRevenueStream(Request $request, $idArray, $idLean)
    {
    	$lean = Lean::where('id_lean', $idLean)->first();
    	$data = $lean->revenue_stream;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = Lean::where('id_lean', $idLean);
    	$newData->update([
    		'revenue_stream' => $string
    	]);

    	return redirect()->back();
    }
}

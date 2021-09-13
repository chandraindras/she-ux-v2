<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_persona;
use DB;

class UserPersonaController extends Controller
{
    public function index(Request $request, $id)
    {
        $dataUserPersona = User_persona::where('id_persona', $id)->get();
        $projectName = DB::table('user_personas')
        					->join('projects', 'user_personas.id_project', '=', 'projects.id')
        					->where('user_personas.id_persona', '=', $id)
        					->select('projects.project_name', 'projects.id')
        					->get();
        return view('persona', compact('dataUserPersona', 'projectName'));
    }

    public function store(Request $request, $id)
    {
        User_persona::create([
            'id_project' => $id,
            'persona_name' => request('persona_name')
        ]);
        
        $idPersona = User_persona::select('id_persona')->where('persona_name', $request->input('persona_name'))->first();

        return redirect()->route('user_persona', [$idPersona['id_persona']]);
    }

    public function addData(Request $request, $id)
    {
    	$goal = implode('+', $request->input('goal'));
    	$frustation = implode('+', $request->input('frustation'));
    	$media = implode('+', $request->input('media'));
    	$device = implode('+', $request->input('device'));

    	$userPersona = User_persona::where('id_persona', $id);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/persona/', $filename);
            // $save->image = $filename;

    	$userPersona->update([
    		'persona_name' => $request->input('persona_name'),
    		'avatar' => $filename,
    		'quote' => $request->input('quote'),
    		'age' => $request->input('age'),
    		'work' => $request->input('work'),
    		'family' => $request->input('family'),
    		'location' => $request->input('location'),
    		'bio' => $request->input('bio'),
    		'goal' => $goal,
    		'frustation' => $frustation,
    		'media' => $media,
    		'device' => $device,
    		'personality' => $request->input('personality'),
    		'fear' => $request->input('fear'),
    		'achievement' => $request->input('achievement'),
    		'growth' => $request->input('growth'),
    		'power' => $request->input('power'),
    		'social' => $request->input('social')
    	]);

    	return redirect()->route('persona_update_view', [$id]);
    }

    public function toUpdatePage(Request $request, $id)
    {
    	$cekUserPersona = User_persona::where('id_persona', $id)->first();

        if(is_null($cekUserPersona->avatar)) {
            return redirect()->route('user_persona', [$id]);
        } else {
           $dataUserPersona = User_persona::where('id_persona', $id)->get();
           $projectName = DB::table('user_personas')
                            ->join('projects', 'user_personas.id_project', '=', 'projects.id')
                            ->where('user_personas.id_persona', '=', $id)
                            ->select('projects.project_name', 'projects.id')
                            ->get();

            return view('persona-update', compact('dataUserPersona', 'projectName')); 
        }
        
    }

    public function addGoal(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$persona = User_persona::where('id_persona', $id);
    		$dataLama = User_persona::select('goal')->where('id_persona', $id)->first();
    		$dataBaru = $request->only([
	    			'goal',
	    	]);

    		if(is_null($dataLama->goal)){
    			$persona->update([
    				'goal' => $request->input('goal')
    			]);
    		} else {
	    		$persona->update([
	    			'goal' => $dataLama->goal.'+'.$request->input('goal')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function editGoal(Request $request, $idArray, $idPersona)
    {
    	$dataBaru = $request->get('goal');
    	$persona = User_persona::where('id_persona', $idPersona)->first();
    	$data = $persona->goal;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = User_persona::where('id_persona', $idPersona);
    	$newData->update([
    		'goal' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyGoal(Request $request, $idArray, $idPersona)
    {
    	$persona = User_persona::where('id_persona', $idPersona)->first();
    	$data = $persona->goal;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = User_persona::where('id_persona', $idPersona);
    	$newData->update([
    		'goal' => $string
    	]);

    	return redirect()->back();
    }

    public function addFrustation(Request $request, $id)
    {
    	if($request->isMethod('post')){
    		$persona = User_persona::where('id_persona', $id);
    		$dataLama = User_persona::select('frustation')->where('id_persona', $id)->first();
    		$dataBaru = $request->only([
	    			'frustation',
	    	]);

    		if(is_null($dataLama->goal)){
    			$persona->update([
    				'frustation' => $request->input('frustation')
    			]);
    		} else {
	    		$persona->update([
	    			'frustation' => $dataLama->frustation.'+'.$request->input('frustation')
	    		]);
    		}
    		
    		return redirect()->back();
    	}
    }

    public function editFrustation(Request $request, $idArray, $idPersona)
    {
    	$dataBaru = $request->get('frustation');
    	$persona = User_persona::where('id_persona', $idPersona)->first();
    	$data = $persona->frustation;
    	$array= explode('+', $data);
    	
    	foreach ($array as $key => $value) {
    		if($key == $idArray){
    			$array[$key] = $dataBaru;
    			continue;
    		}
    	}

    	$string = implode('+', $array);
 
    	$newData = User_persona::where('id_persona', $idPersona);
    	$newData->update([
    		'frustation' => $string
    	]);

    	return redirect()->back();
    }

    public function destroyFrustation(Request $request, $idArray, $idPersona)
    {
    	$persona = User_persona::where('id_persona', $idPersona)->first();
    	$data = $persona->frustation;
    	$array= explode('+', $data);
 
    	unset($array[$idArray]);
		$string = implode('+', $array);
 
    	$newData = User_persona::where('id_persona', $idPersona);
    	$newData->update([
    		'frustation' => $string
    	]);

    	return redirect()->back();
    }

    public function editAvatar(Request $request, $idPersona)
    {
    	$file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/persona/', $filename);

        $userPersona = User_persona::where('id_persona', $idPersona);
    	$userPersona->update([
    		'avatar' => $filename
    	]);

    	return redirect()->back();
    }

    public function editMotivation(Request $request, $idPersona)
    {
    	$userPersona = User_persona::where('id_persona', $idPersona);

    	$userPersona->update([
    		'fear' => $request->input('fear'),
    		'achievement' => $request->input('achievement'),
    		'growth' => $request->input('growth'),
    		'social' => $request->input('social')
    	]);

    	return redirect()->back();
    }

    public function editPersonality(Request $request, $idPersona)
    {
    	$userPersona = User_persona::where('id_persona', $idPersona);

    	$userPersona->update([
    		'personality' => $request->input('personality')
    	]);

    	return redirect()->back();
    }

    public function editName(Request $request, $idPersona)
    {
    	$userPersona = User_persona::where('id_persona', $idPersona);

    	$userPersona->update([
    		'persona_name' => $request->input('persona_name')
    	]);

    	return redirect()->back();
    }

    public function editQuote(Request $request, $idPersona)
    {
    	$userPersona = User_persona::where('id_persona', $idPersona);

    	$userPersona->update([
    		'quote' => $request->input('quote')
    	]);

    	return redirect()->back();
    }

    public function editDemography(Request $request, $idPersona)
    {
    	$userPersona = User_persona::where('id_persona', $idPersona);

    	$userPersona->update([
    		'age' => $request->input('age'),
    		'work' => $request->input('work'),
    		'family' => $request->input('family'),
    		'location' => $request->input('location')
    	]);

    	return redirect()->back();
    }

    public function editBio(Request $request, $idPersona)
    {
    	$userPersona = User_persona::where('id_persona', $idPersona);

    	$userPersona->update([
    		'bio' => $request->input('bio')
    	]);

    	return redirect()->back();
    }

    public function editMedia(Request $request, $idPersona)
    {
        $userPersona = User_persona::where('id_persona', $idPersona);
        $media = implode('+', $request->input('media'));
        
        $userPersona->update([
            'media' => $media
        ]);

        return redirect()->back();
    }

}

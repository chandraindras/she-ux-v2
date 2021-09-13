<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use App\Project;
use Illuminate\Support\Facades\Auth;
use Alert;
use Validator;
use App\Projectmember;
use App\User;
use DB;

class ProjectController extends Controller
{
    public function yourProject()
    {
        $cekProject = Project::where('email_user','=',Auth::user()->email)->count();

        if($cekProject > 0) {
            $dataProject = Project::where('email_user','=',Auth::user()->email)->get();
            return view('yourproject', compact('dataProject'));    
        } else {
            return view('yourproject_empty');
        }
    	
    }

    public function invitationProject()
    {
        $cekProject = Projectmember::where('email','=',Auth::user()->email)->count();

        if($cekProject > 0) {
            $memberProject = DB::table('projects')
                                ->join('projectmembers', 'projects.id', '=', 'projectmembers.idProject')
                                ->where('projectmembers.email','=', Auth::user()->email)
                                ->select('projects.*','projectmembers.email', 'projectmembers.idProject')
                                ->get();
            return view('invitationproject', compact('memberProject'));
        } else {
            return view('invitationproject_empty');
        }
    }

    public function addProject(Request $request)
    {
        $data = new Project([
            'email_user' => Auth::user()->email,
            'project_name' => $request->get('project_name'),
            'project_desc' => $request->get('project_desc')
        ]);
        $data->save();

        echo "<script>
                alert('SUKSES SIMPAN DATA!!');
                </script>";
        return redirect()->back();
    }


    public function updateProject(Request $request, $id)
    {
        if($request->isMethod('post')){
            $lama = Project::find($id);
            $baru = $request->only([
                'project_name',
                'project_desc',
            ]);
            Validator::make($baru, [
                'project_name' => 'required',
                'project_desc' => 'required'
            ])->validate();
            $lama->update([
                'project_name' => $request->project_name,
                'project_desc' => $request->project_desc
            ]);
            return redirect()->back();
        }
        // $where = array('id' => $id);
        // $project = Project::where($where)->first();
        // return Response::json($project);
    }

    public function deleteProject($id)
    {
        $lists = Project::find($id)->delete();
        return response()->json(['status'=>'Data deleted successfully']);
    }

    public function addMember(Request $request, $id)
    {
        if($request->isMethod('post')){
            $idProject = $id;
            $email = $request->email;
            $role = $request->role;

            $cekEmail = User::where('email', '=', $email)->count();

            if($cekEmail > 0) {
                Projectmember::create([
                    'idProject' => $idProject,
                    'email' => $email,
                    'role' => $role
                ]);

                echo "<script>
                        alert('Success Invite Member !');
                        </script>";
                return redirect()->back();
            } else {
                echo "<script>
                    alert('Email not registered !');
                    </script>";
                return redirect()->back();
            }
            
        }
    }

    public function showMember()
    {

    }

}

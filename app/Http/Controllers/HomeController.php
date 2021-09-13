<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Lean;
use App\Project_statement;
use App\Story;
use App\Swot;
use App\Projectmember;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        dd(auth()->user(), Project::where('email_user', '=', auth()->user()->email));
    	$countProject = Project::where('email_user', '=', Auth::user()->email)->count();
    	$countInvitationProject = Projectmember::where('email', '=', Auth::user()->email)->count();
    	$date = Carbon::now();
    	// $image = User::where('id', $id)->get();
        return view('home', compact('countProject', 'countInvitationProject', 'date'));
    }
}

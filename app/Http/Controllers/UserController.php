<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editProfilePicture(Request $request, $id)
    {
    	$this->validate($request, [
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]); 

        $save = User::find($id);
        if ($request->hasFile('image')) 
       	{
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile_picture/', $filename);
            $save->image = $filename;
        }

        $save->save();

        // $user = User::select('email_user')->where('id', $id)->first();
        // echo "SUKSES";
        return redirect()->route('home', [$id]);
    }
}

<?php

namespace App\Http\Controllers\V2\Preview;

use App\Http\Controllers\Controller;

class UserStoryPreviewController extends Controller
{
    public function index()
    {
//        return view('preview_swot');
        return view('v2.preview.user-story.index');
    }
}

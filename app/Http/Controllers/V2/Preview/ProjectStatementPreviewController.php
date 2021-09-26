<?php

namespace App\Http\Controllers\V2\Preview;

use App\Http\Controllers\Controller;

class ProjectStatementPreviewController extends Controller
{
    public function index()
    {
//        return view('preview_swot');
        return view('v2.preview.project-statement.index');
    }
}

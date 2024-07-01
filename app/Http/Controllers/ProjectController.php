<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.project.index');
    }

    public function detail(Request $request, $id) {
        return view('pages.dashboard.project.detail', compact('id'));
    }

   
}

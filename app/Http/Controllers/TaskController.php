<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function detail() {
        return view('pages.dashboard.project.task');
    }

    public function create() {
        dd(request()->all);
        return view('pages.dashboard.project.task');
    }

    public function store() {
        dd(request()->all);
        return view('pages.dashboard.project.task');
    }

    public function update() {
        dd(request()->all);
        return view('pages.dashboard.project.task');
    }

    public function delete() {
        dd(request()->all);
        return view('pages.dashboard.project.task');
    }
}

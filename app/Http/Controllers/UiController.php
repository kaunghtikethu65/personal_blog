<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class UiController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(10);
        return view('ui-panel.index',compact('skills'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;

class UiController extends Controller
{
    public function index()
    {
        /*Skillsの標示処理
        Model名=Skill,Database名=Skill
        */
        $skills = Skill::paginate(10);

        /*Projectsの標示処理
        Model名=Project,Database名=Project
        */
        $projects = Project::all();

        return view('ui-panel.index', compact('skills', 'projects'));
    }
}

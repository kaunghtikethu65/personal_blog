<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Skill,Project,StudentCount,Category};

class UiController extends Controller
{
    public function index()
    {
        /*Skillsの標示処理
        Model名=Skill,Database名=skills
        */
        $skills = Skill::paginate(10);

        /*Projectsの標示処理
        Model名=Project,Database名=projects
        */
        $projects = Project::all();

        /*TotalStudentの標示処理
        Model名=StudentCount,Database名=student_counts
        */
        $stuCount = StudentCount::find(1);

        return view('ui-panel.index', compact('skills', 'projects', 'stuCount'));
    }

    public function postIndex()
    {
        $categories = Category::all();
        return view('ui-panel.posts',compact('categories'));
    }
}

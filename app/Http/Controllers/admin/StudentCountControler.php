<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentCount;

class StudentCountControler extends Controller
{
    public function index()
    {
        //学生又は友達のデータを取得
        $studentCount = StudentCount::all();
        //学生又は友達のデータを検索条件＝＞「id=1」
        $student = StudentCount::find(1);
        //取得した学生又友達のデータを「student-count.index」画面に渡す
        return view('admin-panel.student-count.index', compact('studentCount', 'student'));
    }

    public function store(Request $request)
    {
        //NULL時のエラーチャック
        $request->validate([
            'count' => 'required',
        ]);
        StudentCount::create([
            'count' => $request->count,
        ]);
        return back();
    }


    public function update(Request $request, $id)
    {
        $stuUpdate = StudentCount::find($id);
        $request->validate([
            'count' => 'required',
        ]);

        $stuUpdate->update([
            'count' => $stuUpdate->count + $request->count,
        ]);
        return back();
    }
}

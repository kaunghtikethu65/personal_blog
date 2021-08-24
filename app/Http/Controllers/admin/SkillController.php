<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *Skill Index画面処理
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Paginate(データの標示仕方)
        $skills = Skill::paginate(5);
        return view('admin-panel.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *Skill Create画面処理
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin-panel.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *Skill テーブルカラム追加処理
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //NULLの時のエラーチャック
        $request->validate([
            'name' => 'required',
            'percent' => 'required'
        ]);

        //Skill Create画面から受け取った引数＄idで検索しName、Percentコラムを追加する
        Skill::create([
            'name' => $request->name,
            'percent' => $request->percent
        ]);
        //更新完了後Skill画面に戻す、成功メッセージを標示する
        return redirect('admin/skills')->with('successMsg', 'You have successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return "show page" . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *Skill Edit処理
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Editボタンを押下時、NameとPercentの値を受け取ってSkill Edit画面に渡す
        $skill = Skill::find($id);
        return view('admin-panel.skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *Skill Update 処理
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //NULLの時のエラーチャック
        $request->validate([
            'name' => 'required',
            'percent' => 'required'
        ]);

        //Skill Edit画面から受け取った引数＄idで検索しName、Percentコラムを更新する
        $skill = Skill::find($id);
        $skill->update([
            'name' => $request->name,
            'percent' => $request->percent,
        ]);
        //更新完了後Skill画面に戻す、成功メッセージを標示する
        return redirect('admin/skills')->with('successMsg', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *Skill Delete処理
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //SELECT * FROM skills WHERE $id=??;
        // Skill::find($id)->delete();  //easy way

        //deleteボタンを押下した時渡した＄idを取得しテーブルカラムを削除する
        $skill = Skill::find($id);
        $skill->delete();

        //削除完了後Skill画面に戻す、成功メッセージを標示する
        return redirect('admin/skills')->with('successMsg', 'You have successfully deleted!');
    }
}

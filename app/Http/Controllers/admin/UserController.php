<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

    /**
     *UserController画面処理
     */
class UserController extends Controller
{
    /**
     *User Index画面処理
     */
    public function index()
    {
        //登録済みのユーザ全員を取得
        $users = User::paginate(5);
        //取得したユーザを「user.index」画面に渡す
        return view('admin-panel.user.index')->with('users', $users);
    }

    /**
     *User Edit画面処理
     */
    public function edit($id)
    {
        //「user.index」画面から「edit」画面に元のデータ（Name,Email,Status）を渡す
        //=SELECT * FROM users WHERE id = $id
        $user = User::find($id);
        dd($user);
        //受け取った元のデータ（Name,Email,Status）をedit画面に渡す
        return view('admin-panel.user.edit', compact('user'));
    }

    /**
     *User Update画面処理
     */
    public function update(Request $request, $id)
    {
        //「Edit」画面からUpdateボタンを押下した時$idで検索しテーブルカラムを更新
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        //更新完了後「user.index」画面に戻し、成功メッセージを標示する
        return redirect('/admin/users')->with('successMsg', 'You have successfully updated!');
    }

    /**
     *User delete画面処理
     */
    public function delete($id)
    {
        //「user.index」画面にてDeleteボタンを押下した時$idで検索しテーブルカラムを削除
        $user = User::find($id);
        $user->delete();
        //削除完了後「user.index」画面に戻し、成功メッセージを標示する
        return redirect('/admin/users')->with('successMsg', 'You have successfully deleted!');
    }
}

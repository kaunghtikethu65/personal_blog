<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin-panel.user.index')->with('users' , $users);
    }

    // Edit Page function
    public function edit($id)
    {
        $user = User::find($id);  //=SELECT * FROM users WHERE id = $id
        return view('admin-panel.user.edit',compact('user'));
    }

    //Update Page Function
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);
        return redirect('/admin/users')->with('successMsg', 'You have successfully updated!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users')->with('successMsg', 'You have successfully deleted!');
    }
}

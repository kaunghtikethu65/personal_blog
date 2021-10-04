<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin-panel.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //imageを選択するとき画像種類権限「mimies」を指定するコメント＝＞'require|image|mimes:png,jpg,jpeg'
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',
        ]);

        //$request(blade.php フォウムの要素＝image)から画像を取得し、$imageに代入
        $image = $request->image;
        /*取得した画像($image)のデータから「getClientOriginalName()のfunction」を使い、画像の名だけを取得し、$imageNameに代入
         画像($image)のデータは複数入れる可能性があるため「uniqid().'_'.」キーで画像ファイルを自動保存する
         */
        $imageName = uniqid().'_'.$image->getClientOriginalName();
        /*画像または動画データをデータベースに登録する時①ロカールのフォルダーStorageと②データベース両方にも保存する必要がある。
        ①[local=>storage/app/public/post-images]「storeAs('','')function」を使い保存先('public/post-images')と保存したい変数名($imageName)で指定
        */
        $image->storeAs('public/post-images',$imageName);
        //②データベースへ登録保存する
        Post::create([
            'category_id' => $request->category_id,
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('successMsg', 'You have successfully created!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin-panel.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',
        ]);
        //
        $post = Post::Find($id);
        if($request->hasFile('image'))
        {
            $postImage = $post->image;
            File::delete('storage/post-images/'.$postImage);

            $image = $request->image;
            $imageName = uniqid().'_'.$image->getClientOriginalName();

            $image->storeAs('public/post-images',$imageName);

            $data['image'] = $imageName;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('successMsg','You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $postImage = $post->image;
        File::delete('storage/post-images/'.$postImage);

        $post->delete();
        return redirect()->route('posts.index')->with('successMsg','You have successfully deleted!');
    }
}

////////////////////////////////////Video->51 & 52 replay

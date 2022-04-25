<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
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
        $posts = Post::latest()->paginate(10);
        return view('admin-panel.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.post.create', compact('categories'));
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
        $imageName = uniqid() . '_' . $image->getClientOriginalName();
        /*画像または動画データをデータベースに登録する時①ロカールのフォルダーStorageと②データベース両方にも保存する必要がある。
        ①[local=>storage/app/public/post-images]「storeAs('','')function」を使い保存先('public/post-images')と保存したい変数名($imageName)で指定
        */
        $image->storeAs('public/post-images', $imageName);
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
        $comments = Comment::where('post_id', $id)->get();
        return view('admin-panel.post.comment', compact('comments'));
    }

    /**
     * comment show-hide処理
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function showHideComment($id)
    {
        $comment = Comment::findOrFail($id);

        //コメントのstatusは'show'か'hide'かを確認し該当値を代入する
        $status = $comment->status == 'show' ? 'hide' : 'show';

        //$commentテーブルを更新
        $comment->update([
                'status' => $status,
            ]);

        return back()->with('successMsg', 'comment status changed successfully');
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
        return view('admin-panel.post.edit', compact('categories', 'post'));
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg',   //「nullable」ならデータが無くて更新成功
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::Find($id);
        //requestにImageファイルが新たに追加されたらデータベースに更新する。Imageファイルが新にあるかどうかを「hasFile()」で確認する
        if ($request->hasFile('image')) {
            //更新した新しImageを入れ替える為ロカールフォルダーStorageの中の元Imageを削除する必要がある
            //112行＄postにある元Imageを$postImageに代入し「File::delete」function を使ってロカールStorageのImageを削除する
            $postImage = $post->image;
            //use Illuminate\Support\Facades\File;(★File function利用する為必要Use)
            File::delete('storage/post-images/' . $postImage);

            //元のImageファイルが削除完了後$requestに更新した新しImageをデータベースとロカールにCreateする「アップデート」= Create function↓
            $image = $request->image;
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            //ロカールImageをアップデートする
            $image->storeAs('public/post-images', $imageName);
            //$imageNameだけデータベースにアップデートが必要なので配列でImageを入れ替える
            $data['image'] = $imageName;
        }
        //requestにImageファイルが新たに無ければそのままアップデートする。
        $post->update($data);

        return redirect()->route('posts.index')->with('successMsg', 'You have successfully updated!');
    }

    /**
     * Post削除処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $postImage = $post->image;
        //ロカールのImageを削除する
        File::delete('storage/post-images/' . $postImage);
        //データベースのImageを削除する
        $post->delete();
        return redirect()->route('posts.index')->with('successMsg', 'You have successfully deleted!');
    }
}

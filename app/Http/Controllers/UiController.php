<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Skill, Project, StudentCount, Category, LikesDislike, Post, Comment};
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\PostDec;

class UiController extends Controller
{
    /**
     * HomePage表示処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Skillsの標示処理 Model名=Skill
        $skills = Skill::paginate(10);

        //Projectsの標示処理Model名=Project
        $projects = Project::all();

        //TotalStudentの標示処理Model名=StudentCount
        $stuCount = StudentCount::find(1);

        //LatestPostの標示処理Model名=Post「latest()->take(6)=最新のPost６個を取得」
        $posts = Post::latest()->take(6)->get();

        return view('ui-panel.index', compact('skills', 'projects', 'stuCount', 'posts'));
    }

    /**
     * Blogs処理
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function postIndex()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(10);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }

    /**
     * Blogs=>Post表示処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postDetailsIndex($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $post = Post::find($id);
        $like = LikesDislike::where('post_id', $id)->where('type', 'like')->get();
        $dislike = LikesDislike::where('post_id', $id)->where('type', 'dislike')->get();
        $likeStatus = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
        $comments = Comment::where('post_id', $id)->where('status', 'show')->get();
        return view('ui-panel.post-details', compact('post', 'like', 'dislike', 'likeStatus', 'comments'));
    }

    /**
     * Blogs=>Post「Search」ボタン処理
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $categories = Category::all();

        $searchData = '%' . $request->search_data . '%';

        $posts = Post::where('title', 'Like', $searchData)
            ->orWhere('content', 'Like', $searchData)
            ->orWhere('content', 'Like', $searchData)
            ->orWhereHas('category', function ($category) use ($searchData) {
                $category->where('name', 'Like', $searchData);
            })->paginate(10);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }

    /**
     * Blogs=>Post「Search」ボタン処理
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function searchByCategory($catId)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $catId)->paginate(10);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
}

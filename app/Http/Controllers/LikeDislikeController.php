<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikesDislike;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    /**
     *Post-Like処理
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function like($postId)
    {
        $isExit = LikesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        if ($isExit) {
            if ($isExit->type == 'like') {
                return back();
            } else {
                LikesDislike::where('id', $isExit->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }
        } else {
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'like',
            ]);
            return back();
        }
    }

    /**
     * post-dislike処理
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function disLike($postId)
    {
        $isExit = LikesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        if ($isExit) {
            if ($isExit->type == 'dislike') {
                return back();
            } else {
                LikesDislike::where('id', $isExit->id)->update([
                    "type" => "dislike"
                ]);
            }
            return back();
        } else {
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'disLike',
            ]);
            return back();
        }
    }
}

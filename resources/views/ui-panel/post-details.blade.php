@extends('ui-panel.master')
@section('title', 'postsDetails')
@section('content')
    <div class="post-details">
        <img src="{{ asset('storage/post-images/' . $post->image) }}" style="height: 450px; border: 1px solid gray"
            alt="">
        <div>
            <strong>
                <i class="fa fa-calendar-day"></i>Posted On:
            </strong>
            {{ date('d-M-Y', strtotime($post->created_at)) }}
        </div>
        <div>
            <strong>
                <i class="fa fa-table"></i> Category:
            </strong>
            {{ $post->category->name }}
        </div>

        <br>
        <h5>{{ $post->title }}</h5>
        <p style="text-align: justify;">
            {{ $post->content }}
        </p>

        <form action="" method="POST">
            @csrf
            <div>
                <span>{{ $like->count() }} likes</span> &nbsp;&nbsp;
                <span>{{ $dislike->count() }} dislikes</span> &nbsp;&nbsp;
                <span>{{ $comments->count() }} comments</span>&nbsp;&nbsp;
            </div>
            <button type="submit" formaction="{{ url('/post/like/' . $post->id) }}" class="btn btn-sm btn-success"
                @if ($likeStatus) @if ($likeStatus->type == 'like')
                            disabled @endif
                @endif
                >
                <i class="far fa-thumbs-up"></i> Like
            </button>
            <button type="submit" formaction="{{ url('/post/disLike/' . $post->id) }}" class="btn btn-sm btn-danger"
                @if ($likeStatus) @if ($likeStatus->type == 'dislike')
                            disabled @endif
                @endif
                >
                <i class="far fa-thumbs-down"></i> DisLike
            </button>
            <button type="button" class="btn btn-sm btn-info" data-toggle="collapse" data-target="#commentId">
                <i class="far fa-comment"></i> Comment
            </button>
        </form>


        <div class="collapse comment-section mt-2" id="commentId">
            <form action="{{ url('/post/comment/'.$post->id) }}" method="POST">
                @csrf
                <textarea name="text" id="" cols="26" rows="3" placeholder="Comment" required></textarea>
                <br>
                <button type="submit" class="btn btn-sm btn-info">
                    <i class="far fa-paper-plane"></i> Submit
                </button>
            </form>
            <br>
            @foreach ($comments as $comment)
            <div>
                <img src="{{ asset('images/user.png') }}" alt="">
                <strong>{{ $comment->user->name }}</strong>
                <div class="message-box">
                    {{ $comment->text }}
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection

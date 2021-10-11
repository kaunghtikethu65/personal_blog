@extends('ui-panel.master')
@section('title', 'postsDetails')
@section('content')
    <div class="post-details">
        <img src="{{ asset('storage/post-images/' . $post->image) }}"
            style="height: 450px; border: 1px solid gray" alt="">
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

        <br><br>
        <h5>{{ $post->title }}</h5>
        <p style="text-align: justify;">
            {{ $post->content }}
        </p>
        <div>
            <button class="btn btn-sm btn-success like">
                <i class="far fa-thumbs-up"></i> Like <span>16</span>
            </button>
            <button class="btn btn-sm btn-danger like">
                <i class="far fa-thumbs-down"></i> Like <span>0</span>
            </button>
            <button class="btn btn-sm btn-info comment" data-toggle="collapse" data-target="#collapseExample">
                <i class="far fa-comment"></i> Comment <span>3</span>
            </button>
        </div>
        <br>
        <div class="comment-form">
            <div class="collapse" id="collapseExample">
                <form action="">
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="3"></textarea>
                        <br>
                        <button class="btn btn-primary btn-sm">
                            <i class="far fa-paper-plane"></i> Submit
                        </button>
                    </div>
                </form>
                <br>
                <div>
                    <img src="" alt="">
                    <strong>John</strong>
                    <div class="message-box">
                        great post sir. pls keep up the good work
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('ui-panel.master')
@section('title', 'posts')
@section('content')

    <div class="row">
        <!-- BLOGS -->
        <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="blog">
                    <img src="{{ asset('storage/post-images/' . $post->image) }}"
                        style="border: 1px solid gray; height: 400px;" alt="">
                    <br><br>
                    <h5>{{ $post->title }}</h5>
                    <p>{{ $post->content }}</p>
                    <a href="{{ url('/posts/'.$post->id.'/details') }}">
                        <button class="btn-info btn btn-sm">
                            Read More <i class="fas fa-angle-double-right"></i>
                        </button>
                    </a>
                </div>
            @endforeach

        </div>

        <!-- SIDE BAR -->
        <div class="col-md-4">
            <div class="siderbar">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <button class="btn btn-success">
                            Submit <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <br>
                <h5>Categories</h5>
                <ul>
                    @foreach ($categories as $category)
                        <li>
                            <a href="">{{ $category->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection

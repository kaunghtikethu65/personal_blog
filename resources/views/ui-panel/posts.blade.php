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
                    <p>{{ substr($post->content, 0, 200) }} ....</p>
                    <a href="{{ url('posts/' . $post->id . '/details') }}">
                        <button class="btn-info btn btn-sm">
                            Read More <i class="fas fa-angle-double-right"></i>
                        </button>
                    </a>
                </div>
            @endforeach
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>

        <!-- SIDE BAR -->
        <div class="col-md-4">
            <div class="siderbar">
                <form action="{{ url('/search_posts') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search_data" class="form-control" placeholder="Search ...">
                        <button type="submit" class="btn btn-success">
                             <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </form>
                <br>
                <h5>Categories</h5>
                <ul>
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ url('search_posts_by_category/'.$category->id) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endsection

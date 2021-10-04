@extends('admin-panel.master')
@section('title', 'post index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Post Update Form</div>
                    </div>

                    <form action="{{ url('admin/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">

                                <label for="">Category</label><br>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Image</label><br>
                                <input type="file" name="image" class="@error('image') is-invalid @enderror mb-2">
                                <br>
                                <img src="{{ asset('storage/post-images/' . $post->image) }}" alt=""
                                    style="width: 100px; border:1px solid gray">
                                @error('image')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Enter post title" value="{{ old('title') ?? $post->title }}">
                                @error('title')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" id="" rows="4"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Content Message...">{{ old('content') ?? $post->content }}
                                            </textarea>
                                @error('content')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

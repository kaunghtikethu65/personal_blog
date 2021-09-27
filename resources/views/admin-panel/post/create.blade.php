@extends('admin-panel.master')
@section('title', 'post index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Post Create Form</div>
                    </div>

                    {{-- 画像または動画データをデータベースにインポートするときformで「enctype="multipart/form-data"」を指定する必要がある --}}
                    <form action="{{ url('admin/posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">

                                <label for="">Category</label><br>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Image</label><br>
                                <input type="file" name="image" class="@error('image') is-invalid @enderror">
                                <br>
                                @error('image')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Enter post title" value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" id="" rows="4"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Content Message...">{{ old('content') }}</textarea>
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

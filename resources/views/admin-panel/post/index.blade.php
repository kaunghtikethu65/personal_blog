@extends('admin-panel.master')
@section('title', 'post index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- card-header --}}
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Post</div>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('admin/posts/create') }}" class="btn btn-primary btn-sm float-end mb-3">
                                    <i class="fa fa-plus-circle"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- card-body --}}
                    <div class="card-body">
                        @if (Session('successMsg'))
                            <div class="alert alert-success">
                                <div>{{ Session('successMsg') }}</div>
                                <button class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Post一連表示処理 --}}
                                @foreach ($posts as $index => $post)
                                    <tr>
                                        <td>{{ $index + $posts->firstItem() }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="" width="100px">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td><textarea readonly>{{ $post->content }}</textarea></td>
                                        <td>
                                            {{-- Post「編集」と「削除」 --}}
                                            <form action="{{ url('admin/posts/'.$post->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ url('admin/posts/'.$post->id.'/edit') }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are sure you want to delete?')">
                                                    <i class="fa fa-trash-alt"></i> Delete
                                                </button>
                                                <a href="{{ url('admin/posts/'.$post->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-comments">Comments</i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- card-footer --}}
                    <div class="card-footer text-muted">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@extends('admin-panel.master')
@section('title', 'category index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- card-header --}}
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Category</div>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('admin/categories/create') }}" class="btn btn-primary btn-sm float-end mb-3">
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>

                                            <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ url('admin/categories/'.$category->id.'/edit') }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are sure you want to delete?')">
                                                    <i class="fa fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- card-footer --}}
                    <div class="card-footer text-muted">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


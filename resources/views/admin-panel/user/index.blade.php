@extends('admin-panel.master')
@section('title', 'user index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User</div>
                    </div>
                    <div class="card-body">
                        @if (Session('successMsg'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div>{{ Session('successMsg') }}</div>
                                <button class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                            </div>
                        @endif

                        <!-- User一覧標示処理 -->
                        <!-- 参照コントローラー /*UserController*/ -->
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>

                                            <form action="{{ url('admin/users/' . $user->id . '/delete') }}"
                                                method="POST">
                                                @csrf
                                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                                    class="btn btn-success btn-sm"><i class="far fa-edit"></i> Edit</a>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    {{ $users->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

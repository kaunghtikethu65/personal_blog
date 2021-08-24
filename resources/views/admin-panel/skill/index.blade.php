@extends('admin-panel.master')
@section('title', 'skill index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- card-header --}}
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Skills</div>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('admin/skills/create') }}" class="btn btn-primary btn-sm float-end mb-3">
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
                                <th>Percent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $skill)
                                <tr>
                                    <td>{{ $skill->id }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->percent }}</td>
                                    <td>
                                        <a href="{{ url('admin/skills/'.$skill->id.'/edit') }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-alt"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- card-footer --}}
                <div class="card-footer text-muted">
                    {{ $skills->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

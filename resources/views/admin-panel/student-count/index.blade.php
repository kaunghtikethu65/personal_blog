@extends('admin-panel.master')
@section('title', 'project index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- card-header --}}
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Student Count</div>
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

                        {{-- $student_countsテーブルに値は'0'の場合 --}}
                        @if ($studentCount->count() < 1)
                            <form action="{{ url('admin/student_counts/store') }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="number" name="count"
                                        class="form-control @error('count') is-invalid @enderror"
                                        style="border-radius: 4px 0px 0px 4px">
                                    <button class="btn btn-primary" style="border-radius: 0px 4px 4px 0px">Create</button>
                                </div>
                                @error('count')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </form>
                        @endif

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>{{ $student->count }}</td> --}}
                                    <td>
                                            <a href="" class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Add
                                            </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- card-footer --}}
                    <div class="card-footer text-muted">
                        {{-- {{ $projects->links('pagination::bootstrap-4') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

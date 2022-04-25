@extends('admin-panel.master')
@section('title', 'student index')
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

                        {{-- $student_countsテーブルに値無しの場合下記のフォウムを表示する --}}
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

                        {{-- Student Count追加処理 --}}
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($student)
                                    <tr>
                                        <td>{{ $student->count }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm" id="addBtn">
                                                <i class="fa fa-plus-circle"></i> Add More
                                            </button>

                                            <form action="{{ url('admin/student_counts/' . $student->id . '/update') }}"
                                                method="POST" class="col-md-6" id="addForm" style="display: none">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="number" name="count"
                                                        class="form-control @error('count') is-invalid @enderror " required
                                                        placeholder="Enter Student count"
                                                        style="border-radius: 4px 0px 0px 4px">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="border-radius: 0px 4px 4px 0px">
                                                        <i class="fa fa-plus-circle"></i> Add
                                                    </button>
                                                </div>
                                                @error('count')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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

@section('javascript')
    <script>
        //Add Moreボタン押下時InputBox表示の動作
        $(document).ready(function() {
            $('#addBtn').click(function() {
                $('#addForm').css('display', 'block');
                $(this).css('display', 'none');
            });
        });
    </script>
@endsection

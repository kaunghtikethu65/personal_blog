@extends('admin-panel.master')
@section('title', 'Post Comments')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- card-header --}}
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Comments</div>
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
                            <tbody>
                                {{-- Comments一連表示処理 --}}
                                @if ($comments->count() < 1)
                                    oh! comment not found.
                                @else
                                    @foreach ($comments as $index => $comment)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $comment->text }}</td>
                                            <td>
                                                {{-- Comments「隠し」と「表示」 --}}
                                                <form action="{{ url('admin/comment/' . $comment->id . '/show_hide') }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm
                                                        {{ $comment->status == 'show' ? 'btn-danger' : 'btn-success' }}">
                                                        <i class="fa fa-edit"></i>
                                                        {{ $comment->status == 'show' ? 'Hide' : 'Show' }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- card-footer --}}
                    <div class="card-footer text-muted">
                        {{-- {{ $posts->links('pagination::bootstrap-4') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

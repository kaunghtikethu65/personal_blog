@extends('admin-panel.master')
@section('title', 'category index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Category Update Form</div>
                    </div>

                    <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $category->name }}">
                                @error('name')
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

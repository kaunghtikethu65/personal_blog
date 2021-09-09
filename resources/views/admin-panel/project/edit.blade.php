@extends('admin-panel.master')
@section('title', 'project edit')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Project Update Form</div>
                </div>

                <form action="{{ route('projects.update',$project->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter project name" value="{{ $project->name ?? old('name') }}">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">URL</label>
                            <input type="text" name="url"
                                class="form-control mb-3 @error('url') is-invalid @enderror"
                                placeholder="Enter project url" value="{{ $project->url ?? old('percent') }}">
                            @error('url')
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

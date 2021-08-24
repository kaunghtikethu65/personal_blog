@extends('admin-panel.master')
@section('title', 'skill edit')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Skill Edit Form</div>
                </div>

                <form action="{{ url('admin/skills/'.$skill->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter skill name" value="{{ $skill->name ?? old('name') }}">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Percent</label>
                            <input type="text" name="percent"
                                class="form-control mb-3 @error('percent') is-invalid @enderror"
                                placeholder="Enter skill percent" value="{{ $skill->percent ?? old('percent') }}">
                            @error('percent')
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

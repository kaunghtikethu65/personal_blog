@extends('admin-panel.master')
@section('title', 'skill index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5>Skill Create Form</h5>
            <form action="{{ url('admin/skills') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter skill name" value="{{ old('name') }}">
                    @error('name')
                        <span><small class="text-danger">{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Percent</label>
                    <input type="text" name="percent" class="form-control @error('psercent') is-invalid @enderror"
                        placeholder="Enter skill percent" value="{{ old('percent') }}">
                    @error('percent')
                        <span><small class="text-danger">{{ $message }}</small></span>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

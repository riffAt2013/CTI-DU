@extends('admin.layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="m-3" style="margin-bottom: 20px">

        <div class="button-list-flex">
            <h4>Create Completed Research</h4>

            <a href="{{ route('completed-research.index') }}">
                <button class="btn btn-primary" href>
                    Completed Research List
                </button>
            </a>
        </div>


        <form action="{{route('completed-research.store')}}" method="POST">
            @csrf

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="title">Completed Research Title</label>
                    <input type="text" name="title"
                        class="form-control md-2 {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        value="{{ old('title') }}" placeholder="Write Your Title" />
                    @if ($errors->has('title'))
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="title">Completed Research Description</label>
                    <textarea class="form-control summernote d-none" id="description"
                        placeholder="Write Your Description" rows="3" name="description" cols="50"></textarea>
                    @if ($errors->has('description'))
                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <button class="btn btn-success mt-2" type="submit">Submit Info</button>
            </div>
        </form>
    </div>
</div>

@endsection
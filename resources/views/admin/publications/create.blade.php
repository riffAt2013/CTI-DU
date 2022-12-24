@extends('admin.layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="m-3" style="margin-bottom: 20px">

        <div class="button-list-flex">
            <h4>Create Publication</h4>

            <a href="{{ route('publication.index') }}">
                <button class="btn btn-primary" href>
                    Publication List
                </button>
            </a>
        </div>


        <form action="{{route('publication.store')}}" method="POST">
            @csrf

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="title">Publication Title</label>
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
                    <label for="title">Publication Description</label>
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
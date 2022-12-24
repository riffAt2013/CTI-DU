@extends('admin.layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="m-3" style="margin-bottom: 20px">

        <div class="button-list-flex">
            <h4>Create Organization</h4>

            <a href="{{ route('organization.index') }}">
                <button class="btn btn-primary" href>
                    Organization List
                </button>
            </a>
        </div>


        <form action="{{route('organization.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="title">Organization Title</label>
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
                    <label>Organization Image</label>
                    <div class="custom-file">
                        <input type="file" name="image"
                            class="custom-file-input form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                            id="PartnersImageFile" />
                        <label class="custom-file-label" for="PartnersImageFile">Choose file</label>
                        @if ($errors->has('image'))
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div id="emailHelp" class="form-text text-info">Recommended image shape:(600x600) px </div>
                    {{-- this one --}}
                    <img class="mt-2" style="display: none" src="#" id="image_tag" width="200px" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="title"> Description</label>
                    <textarea class="form-control summernote" id="description" placeholder="Write Your Description"
                        name="description"></textarea>
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

@push('scripts')
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image_tag').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#PartnersImageFile").change(function(){
            document.getElementById('image_tag').style.display = "block";
            readURL(this);
        });
</script>

@endpush

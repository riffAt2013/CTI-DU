@extends('admin.layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="m-3" style="margin-bottom: 20px">

        <div class="button-list-flex">
            <h4>Create Heroes</h4>

            <a href="{{ route('hero.index') }}">
                <button class="btn btn-primary" href>
                    Heroes List
                </button>
            </a>
        </div>


        <form action="{{route('hero.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                        <input type="file" name="image"
                            class="custom-file-input form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                            id="PartnersImageFile" />
                        <label class="custom-file-label" for="PartnersImageFile">Choose file</label>
                        @if ($errors->has('image'))
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div id="emailHelp" class="form-text text-info">Recommended image shape:(1024x768) px </div>
                    {{-- this one --}}
                    <img class="mt-2" src="#" id="image_tag" width="200px" />
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
            readURL(this);
        });
</script>

@endpush
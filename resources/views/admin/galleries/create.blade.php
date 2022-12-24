@extends('admin.layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="m-3" style="margin-bottom: 20px">


        <div class="button-list-flex">
            <h4>Create Galleries</h4>

            <a href="{{ route('gallery.index') }}">
                <button class="btn btn-primary" href>
                    Galleries List
                </button>
            </a>
        </div>



        <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="title">Category</label>
                    <textarea class="form-control" id="category" placeholder="Write Your category" rows="3"
                        name="category" cols="50"></textarea>
                    @if ($errors->has('category'))
                    <div class="invalid-feedback">{{ $errors->first('category') }}</div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">

                        {{-- id image eita boshan lagbe --}}
                        <input type="file" name="image"
                            class="custom-file-input form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                            id="image" />
                        <label class="custom-file-label" for="PartnersImageFile">Choose file</label>
                        @if ($errors->has('image'))
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @endif

                    </div>
                    {{-- this needs to be reciprocated --}}
                    <div id="emailHelp" class="form-text text-info">Recommended image shape:(600x400) px </div>
                    {{-- this one --}}
                    <img class="mt-2" style="display: none" src="#" id="image_tag" width="200px" />
                </div>

            </div>
            <div class="col-sm-12 col-md-6">
                <button class="btn btn-success mt-2" type="submit">Submit Info</button>
            </div>
        </form>
    </div>
</div>

@endsection


{{-- this script --}}
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
        $("#image").change(function(){
            document.getElementById('image_tag').style.display = "block";
            readURL(this);
        });
</script>

@endpush

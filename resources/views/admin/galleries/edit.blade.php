@extends('admin.layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="card-body table-full-width table-responsive">

        <div class="button-list-flex">
            <h4> Galleries Edit</h4>

            <a href="{{ route('gallery.index') }}">
                <button class="btn btn-primary" href>
                    Galleries List
                </button>
            </a>
        </div>

        <!--begin::Form-->
        <form action="{{route('gallery.update', $gallery->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="row col-md-6 flexbox">

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group  m-form__group {{ $errors->has('category') ? 'has-danger' : '' }}">
                            <label class="form-control-label"><span class="text-danger">*</span> Category </label>
                            <textarea class="form-control" id="category" placeholder="" rows="3" name="category"
                                cols="50">{{ old('category', $gallery->category) }}</textarea>
                            @if ($errors->has('category'))
                            <div class="form-control-feedback">{{ $errors->first('category') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="service-flex">
                            <div class="form-group service-flex">
                                <label class="form-control-label">Image</label>
                                <img class="img-thumbnail" src="{{ asset('assets/uploads/gallery/'.$gallery->image)}}"
                                    width="200px">
                            </div>
                            <div class="custom-file">
                                <input type="file" name="image"
                                    class="custom-file-input form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    id="image" />
                                <label class="custom-file-label" for="PartnersImageFile">Choose file</label>
                                @if ($errors->has('image'))
                                <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div id="emailHelp" class="form-text text-info">Recommended image shape:(600x400) px </div>
                            <img class="mt-4" style="display: none" src="#" id="image_tag" width="200px" />
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions text-center flexbox">
                            <a href="{{ route('gallery.index') }}" class="btn btn-danger btn-flex"><i
                                    class="fa fa-times"></i> Cancel</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
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
        $("#image").change(function(){
            document.getElementById('image_tag').style.display = "block";
            readURL(this);
        });
</script>

@endpush

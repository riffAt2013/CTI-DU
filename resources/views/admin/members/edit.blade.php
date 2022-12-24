@extends('admin.layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="main-card mb-3 card">
    <div class="card-body table-full-width table-responsive">

        <div class="button-list-flex">
            <h4> Member Details Edit</h4>

            <a href="{{ route('member.index') }}">
                <button class="btn btn-primary" href>
                    Member List
                </button>
            </a>
        </div>

        <!--begin::Form-->
        <form action="{{route('member.update', $member->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="row col-md-6 flexbox">

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group  m-form__group {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label class="form-control-label"><span class="text-danger">*</span> Name </label>
                            <textarea class="form-control" id="name" placeholder="" rows="3" name="name" cols="50">{{
                                old('name', $member->name) }}</textarea>
                            @if ($errors->has('name'))
                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group  m-form__group {{ $errors->has('designation') ? 'has-danger' : '' }}">
                            <label class="form-control-label"><span class="text-danger">*</span> Designation </label>
                            <textarea class="form-control" id="designation" placeholder="" rows="3" name="designation"
                                cols="50">{{ old('designation', $member->designation)
                                }}</textarea>
                            @if ($errors->has('designation'))
                            <div class="form-control-feedback">{{ $errors->first('designation') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group  m-form__group {{ $errors->has('message') ? 'has-danger' : '' }}">
                            <label class="form-control-label"><span class="text-danger">*</span> Designation </label>
                            <textarea class="form-control" id="message" placeholder="" rows="3" name="message"
                                cols="50">{{ old('message', $member->message)
                                }}</textarea>
                            @if ($errors->has('message'))
                            <div class="form-control-feedback">{{ $errors->first('message') }}</div>
                            @endif
                        </div>
                    </div>


                    {{-- member image area --}}
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <div class="service-flex">
                                <label class="form-control-label">Member Image</label>
                                <img class="img-thumbnail" src="{{ asset('assets/uploads/member/'.$member->image)}}"
                                    width="200px">
                            </div>
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
                            <img class="mt-4" style="display: none" src="#" id="image_tag" width="200px" />
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions text-center flexbox">
                            <a href="{{ route('member.index') }}" class="btn btn-danger btn-flex"><i
                                    class="fa fa-times"></i> Cancel</a>
                            <button type="submit" class="btn btn-success btn-flex"><i class="fa fa-save"></i>
                                Save</button>
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
        $("#PartnersImageFile").change(function(){
            document.getElementById('image_tag').style.display = "block";
            readURL(this);
        });
</script>

@endpush

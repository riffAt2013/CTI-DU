@extends('admin.layouts.app')

@section('content')
    @include('sweetalert::alert')
    <div class="main-card mb-3 card">
        <div class="m-3" style="margin-bottom: 20px">
            <h4>Create Contacts</h4>

            <form action="{{route('contact.store')}}" method="POST">
                @csrf

                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" class="form-control md-2 {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Write Your Name" />
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="title">Email</label>
                        <input type="email" name="email" class="form-control md-2 {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Write Your email" />
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="title">Phone</label>
                        <input type="text" name="phone" class="form-control md-2 {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="Write Your phone" />
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="title">Address</label>
                        <textarea class="form-control" id="address" placeholder="Write Your address" rows="3" name="address" cols="50"></textarea>
                        @if ($errors->has('address'))
                            <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="title">Message</label>
                        <textarea class="form-control" id="message" placeholder="Write Your message" rows="3" name="message" cols="50"></textarea>
                        @if ($errors->has('message'))
                            <div class="invalid-feedback">{{ $errors->first('message') }}</div>
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

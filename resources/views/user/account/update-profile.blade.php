@extends('layouts.user')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Update Profile Section</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span></a>
                        </li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('user.profile') }}" class="btn btn-link"><span
                                            class="fa fa-arrow-left"></span></a> Update Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <form role="form" action="{{ route('user.update.profile') }}" method="POST"
                                      id="{{ config('app.env') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        @include('inc.alert')

                                        <div class="form-group">
                                            <label for="img">New Profile Image</label>
                                            <input type="file" name="img" id="img"
                                                   class="form-control  @error('img') is-invalid @enderror">
                                            @error('img')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ward_id">New Ward <i
                                                        class="text-primary">Optional</i></label>
                                            <select name="ward_id" id="ward_id"
                                                    class="form-control @error('ward_id') is-invalid @enderror">
                                                @foreach($wards as $ward)
                                                    @if($ward->id == auth()->user()->ward_id)
                                                        <option value="{{ $ward->id }}" selected>
                                                            -- {{ $ward->name }}--
                                                        </option>
                                                    @else
                                                        <option value="{{ $ward->id }}">-- {{ $ward->name }}--
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            @error('ward_id')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>Please select ward</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender" id="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                <option value="{{ __('-- Select New Gender --') }}" selected
                                                        disabled>{{ __('-- Select New Gender --') }}</option>
                                                <option value="{{ __('male') }}">{{ __('Male') }}</option>
                                                <option value="{{ __('female') }}">{{ __('Female') }}</option>
                                                <option value="{{ __('others') }}">{{ __('Others') }}</option>
                                            </select>

                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="username">New Username <i
                                                        class="text-primary">Optional</i></label>
                                            <input type="text"
                                                   class="form-control  @error('username') is-invalid @enderror"
                                                   id="username" name="username"
                                                   placeholder="Current Username - {{ auth()->user()->username }}">

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">New Email <i class="text-primary">Optional</i></label>
                                            <input type="email"
                                                   class="form-control  @error('email') is-invalid @enderror"
                                                   id="email" name="email"
                                                   placeholder="Current Email - {{ auth()->user()->email }}">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="phoneNumber">New Phone Number <i
                                                        class="text-primary">Optional</i></label>
                                            <input type="text"
                                                   class="form-control  @error('phoneNumber') is-invalid @enderror"
                                                   id="phoneNumber" name="phoneNumber"
                                                   placeholder="Current Phone Number - {{ auth()->user()->phoneNumber }}">

                                            @error('phoneNumber')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-block"><span
                                                        class="fa-refresh fa"></span> Update Profile
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        document.querySelector('#{{ config('app.env') }}').addEventListener('submit', function (e) {
            let form = this;
            e.preventDefault(); // <--- prevent form from submitting
            $('button').attr('disabled', true);

            swal({
                title: "Update Profile",
                text: "Are you sure you want to proceed?",
                type: "question",
                showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false,
                dangerMode: true,
            }).then((willPromote) => {
                e.preventDefault();
                if (willPromote.value) {
                    form.submit(); // <--- submit form programmatically
                } else {
                    swal("Cancelled :)", "", "success");
                    e.preventDefault();
                    $('button').attr('disabled', false);
                    return false;
                }
            });
        });
    </script>
@endsection

@extends('layouts.user')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>Profile Section</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><span class="fa fa-home"></span></a>
                        </li>
                        <li class="breadcrumb-item active">{{ auth()->user()->name }} Profile</li>
                    </ol>
                </div>
            </div>
            <hr>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ asset(\App\Http\Controllers\SystemController::pathToMedia(true,false)) }}/{{ auth()->user()->mediaPath }}"
                                     alt="User profile picture">
                            </div>
                            <hr>
                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                            <hr>
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block"><b>Logout</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="{{ route('user.profile') }}"
                                    >Account Details</a></li>
                                &nbsp;
                                &nbsp;
                                <li class="nav-item"><a class="nav-link active"
                                                        href="{{ route('user.update.profile') }}"
                                    ><span class="fa fa-edit"></span></a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Account -->
                                    <div class="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-hover table-responsive">
                                                    <tr>
                                                        <td><h3><span class="fa fa-user text-primary"></span></h3></td>
                                                        <td><p>{{ auth()->user()->name }}</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><span class="fa fa-user-secret text-primary"></span>
                                                            </h3></td>
                                                        <td><p>{{ auth()->user()->username }}</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><span class="fa fa-envelope text-primary"></span></h3>
                                                        </td>
                                                        <td><p>{{ auth()->user()->email }}</p></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table-responsive table table-hover">
                                                    <tr>
                                                        <td>
                                                            <h3>
                                                                @if(auth()->user()->gender === 'male')
                                                                    <span class="fa fa-male text-primary"></span>
                                                                @elseif(auth()->user()->gender === 'female')
                                                                    <span class="fa fa-female text-primary"></span>
                                                                @else
                                                                    <span class="fa fa-group text-primary"></span>
                                                                @endif
                                                            </h3>
                                                        </td>
                                                        <td><p>{{ auth()->user()->gender }}</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><span class="fa fa-mobile text-primary"></span></h3>
                                                        </td>
                                                        <td><p>{{ auth()->user()->phoneNumber }}</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3><span class="fa fa-location-arrow text-primary"></span>
                                                            </h3>
                                                        </td>
                                                        <td><p>{{ auth()->user()->ward->name }}</p></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 offset-4">
                                                <h6 class="text-danger text-bold">
                                                    Last Login :: <span
                                                            class="text-black-50">{{ date('F d, Y h:m a', strtotime(auth()->user()->updated_at)) }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.Account -->
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

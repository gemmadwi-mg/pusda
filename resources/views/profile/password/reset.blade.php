@extends('layouts.base')
@section('title','Change Password')
@section('content')


            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                            <li class="breadcrumb-item active">@yield('title')</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Change Password</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                    <!-- start card -->
                                    <div class="card">
                                    <!-- start card header -->
                                    <div class="card-header bg-warning">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="text-light text-dark">Form @yield('title')</h4>
                                            </div><!-- end col-->
                                            <div class="col-lg-4">
                                                <div class="text-lg-right">
                                                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-danger" title="Back"><div class="fas fa-reply"></div></a>
                                                </div>
                                            </div><!-- end col-->
                                        </div> <!-- end row -->
                                    </div>
                                    <!-- end card header -->

                                        <!-- start card-body -->
                                        <div class="card-body">

                                            <form action="#" method="POST">
                                                @csrf
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                                <label for="userpassword">Old password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input id="password" type="password" class="form-control"
                                                                    placeholder="Enter your old password" name="current-password" required="">
                                                                    @if ($errors->has('current-password'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('current-password') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                    <div class="input-group-append" data-password="false">
                                                                        <div class="input-group-text">
                                                                            <span class="password-eye"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                        <div class="col-md-12">
                                                            <div class="form-group {{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                                <label for="lastname">New Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input id="password" type="password" class="form-control"
                                                                    placeholder="Enter your new password" name="new-password" required="">
                                                                    @if ($errors->has('new-password'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('new-password') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                    <div class="input-group-append" data-password="false">
                                                                        <div class="input-group-text">
                                                                            <span class="password-eye"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="lastname">Confirm New Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                                    placeholder="Enter your Confirm New Password" name="new-password_confirmation" required="">
                                                                    <div class="input-group-append" data-password="false">
                                                                        <div class="input-group-text">
                                                                            <span class="password-eye"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                                </div>
                                             </form>
                                        </div>
                                    <!-- end card-->

                            </div> <!-- end col -->
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

@stop

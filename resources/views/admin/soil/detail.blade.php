@extends('layouts.base')
@section('title','Detail Asset Soil')
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
                                        <li class="breadcrumb-item"><a href="{{route('soil.index')}}">Asset Soil</a></li>
                                        <li class="breadcrumb-item active">@yield('title')</li>
                                    </ol>
                                </div>
                                <h4 class="page-title"/>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-4 col-xl-4">
                            <div class="card-box text-center">
                                <img src="{{asset('assets/images/user-circle.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                <h4 class="mb-0">Geneva McKnight</h4>
                                <p class="text-muted">@webdesigner</p>

                                <div class="text-left mt-3">

                                </div>
                            </div> <!-- end card-box -->

                        </div> <!-- end col-->

                        <div class="col-lg-8 col-xl-8">
                            <div class="card-box">
                                <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                             Parent
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            Children
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="aboutme">

                                        <form>
                                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i>Parent</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstname">First Name</label>
                                                        <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Last Name</label>
                                                        <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="userbio">Bio</label>
                                                        <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="useremail">Email Address</label>
                                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                                        <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                        <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->


                                        </form>

                                    </div> <!-- end tab-pane -->
                                    <!-- end about me section content -->

                                    <div class="tab-pane" id="settings">
                                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                            List Children </h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Project Name</th>
                                                        <th>Start Date</th>
                                                        <th>Due Date</th>
                                                        <th>Status</th>
                                                        <th>Clients</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>App design and development</td>
                                                        <td>01/01/2015</td>
                                                        <td>10/15/2018</td>
                                                        <td><span class="badge badge-info">Work in Progress</span></td>
                                                        <td>Halette Boivin</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Coffee detail page - Main Page</td>
                                                        <td>21/07/2016</td>
                                                        <td>12/05/2018</td>
                                                        <td><span class="badge badge-success">Pending</span></td>
                                                        <td>Durandana Jolicoeur</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Poster illustation design</td>
                                                        <td>18/03/2018</td>
                                                        <td>28/09/2018</td>
                                                        <td><span class="badge badge-pink">Done</span></td>
                                                        <td>Lucas Sabourin</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Drinking bottle graphics</td>
                                                        <td>02/10/2017</td>
                                                        <td>07/05/2018</td>
                                                        <td><span class="badge badge-blue">Work in Progress</span></td>
                                                        <td>Donatien Brunelle</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Landing page design - Home</td>
                                                        <td>17/01/2017</td>
                                                        <td>25/05/2021</td>
                                                        <td><span class="badge badge-warning">Coming soon</span></td>
                                                        <td>Karel Auberjo</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!-- end settings content-->

                                </div> <!-- end tab-content -->
                            </div> <!-- end card-box-->

                        </div> <!-- end col -->
                    </div>

                    </div> <!-- container -->
                </div> <!-- content -->
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->

           <!-- ============================================================== -->



@stop

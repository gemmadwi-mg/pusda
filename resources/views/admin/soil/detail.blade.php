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
                                <h4 class="page-title">
                                    <div class="text-lg-left">
                                        <a href="{{ route('soil.index') }}" class="btn btn-sm btn-danger" title="Back"><div class="fas fa-reply"></div></a>
                                    </div>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">


                        <div class="col-md-12">
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
                                                        <label for="firstname">Author</label>
                                                        <input type="text" class="form-control" readonly value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Author Email</label>
                                                        <input type="text" class="form-control" readonly value="{{Auth::user()->email}}">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstname">Certificate Number</label>
                                                        <input type="text" class="form-control" readonly value="{{$parent->certificate_number}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Certificate Date</label>
                                                        <input type="text" class="form-control" readonly value="{{$parent->certificate_date}}">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstname">Utilization Type</label>
                                                        <input type="text" class="form-control" readonly value="{{$parent->utilization_type}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastname">Large</label>
                                                        <input type="text" class="form-control" readonly value="{{$parent->large}}">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="userbio">Address</label>
                                                        <textarea class="form-control" id="userbio" rows="4" readonly>{{$parent->address}}</textarea>
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
                                            <div class="dropdown float-left">
                                                <form action="{{route('importanak.post')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                     <div class="input-group mb-3">
                                                        <input type="file" name="file" required="" onfocus="file" accept=".xls,.xlsx"
                                                        class="form-control @error('file') is-invalid @enderror" placeholder="Recipient's username"
                                                        aria-label="Recipient's username" aria-describedby="button-addon2">
                                                        <button class="btn btn-primary" type="submit" id="button-addon2" required>IMPORT</button>
                                                        @error('file')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                         @enderror
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="dropdown float-right">
                                                <a href="#" title="Create" class=" font-18 btn btn-xs btn-light">
                                                    <i class="mdi mdi-plus"></i>
                                                </a>
                                            </div>
                                            <table class="table table-borderless mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Rental Retribution</th>
                                                        <th>Utilization Engagement Type</th>
                                                        <th>Utilization Engagement Name</th>
                                                        <th>Allotment</th>
                                                        <th>Coordinate</th>
                                                        <th>Large</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($childer as $no => $c )
                                                    <tr>
                                                        <td>{{ $no + $childer->firstItem() }}</td>
                                                        <td> {{$c->rental_retribution}} </td>
                                                        <td>{{$c->utilization_engagement_type}}</td>
                                                        <td>{{$c->utilization_engagement_name}}</td>
                                                        <td> {{$c->allotment_of_use}} </td>
                                                        <td>{{$c->coordinate}}</td>
                                                        <td>{{$c->large}}</td>

                                                        <td class="text-center">
                                                                <a href="" title="Detail" class="btn btn-xs btn-light">
                                                                    <i class="mdi mdi-eye text-info"></i>
                                                                </a>
                                                                <a href="" title="Edit" class="btn btn-xs btn-light">
                                                                    <i class="mdi mdi-pencil text-warning"></i>
                                                                </a>

                                                                <a href="#" title="Import Data Excel" class="btn btn-xs btn-light">
                                                                    <i class="mdi mdi-file-import text-success"></i>
                                                                </a>
                                                        </td>

                                                    </tr>

                                                </tbody>
                                                @empty
                                                <td colspan="8" class="table-active text-center bg-dark text-white">No Data Yet</td>
                                                @endforelse
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

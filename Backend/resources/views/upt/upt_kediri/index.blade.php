@extends('layouts.base')
@section('title','Asset Soil')
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
                                <h4 class="page-title"><i data-feather="database"></i> @yield('title') </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                        <div class="col-xl-12 " >
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" title="Import Data Excel" class=" font-18 btn btn-xs btn-light mr-2">
                                            <i class="mdi mdi-file-import text-success"></i>
                                        </a>
                                        <a href="{{route('kediri.create')}}" title="Create" class=" font-18 btn btn-xs btn-light">
                                            <i class="mdi mdi-plus"></i>
                                        </a>
                                    </div>

                                    <h4 class="header-title mb-3 text-dark">Data Parent</h4>
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-nowrap table-hover table-centered m-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>No Reg</th>
                                                    <th>Name Goods</th>
                                                    <th>Address</th>
                                                    <th>No</th>
                                                    <th>Date</th>
                                                    <th>Large</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                @foreach($data  as $no => $n)
                                                <tr >
                                                    <td> {{ $no + $data->firstItem() }} </td>
                                                    <td> {{$n->no_reg}} </td>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal"> {{$n->name_goods}} </h5>
                                                    </td>
                                                    <td>  {!! Str::limit($n->address, 20, ' ...') !!} </td>
                                                    <td> {{$n->no}} </td>
                                                    <td> {{$n->date}} </td>
                                                    <td>{{$n->large}} </td>
                                                    <td class="text-center">
                                                        <a href="{{route('kediri.show', ['kediri' => $n->no_reg])}}" title="Detail" class="btn btn-xs btn-light">
                                                            <i class="mdi mdi-eye text-info"></i>
                                                        </a>
                                                        <a href="{{route('kediri.edit', ['kediri' => $n->no_reg])}}" title="Edit" class="btn btn-xs btn-light">
                                                            <i class="mdi mdi-pencil text-warning"></i>
                                                        </a>
                                                        <a href="#" title="Edit" class="btn btn-xs btn-light">
                                                            <i class="mdi mdi-trash-can text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box-->
                                {{$data->links('vendor.pagination.bootstrap-4')}}
                            </div>
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->

           <!-- ============================================================== -->








@stop

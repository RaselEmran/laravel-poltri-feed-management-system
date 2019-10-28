@extends('welcome')
@section('title','Feed-System')
@push('css')

@endpush

@section('content')
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 ">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                              <a href="{{route('admin.customer')}}">
                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white">কাস্টমার</h6>
                                <?php $cus=DB::table('buyers')->count() ?>
                                <p class="font-light text-white">{{$cus}}</p>
                              </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                              <a href="{{route('admin.category')}}">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                <h6 class="text-white">ক্যাটাগরি</h6>
                                <?php $cat=DB::table('categories')->count() ?>
                                <p class="text-white">{{$cat}}</p>
                              </a>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <a href="{{route('admin.sell-product.regular-cust')}}">
                                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <h6 class="text-white">নিয়মিত কাস্টমার</h6>
                                </a>
                            </div>
                        </div>
                    </div>
  
                    <!-- Column -->

                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-md-6">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <a href="{{route('admin.sellinfo')}}">
                                    <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                    <h6 class="text-white">বিক্রিত পণ্য</h6>
                                    <?php $sell=DB::table('sell_totals')->count() ?>
                                    <p class="text-white">{{$sell}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 ">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                            <a href="{{route('admin.sell-product.mobile')}}">
                                <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                                <h6 class="text-white">অনিয়মিত কাস্টমার</h6>
                            </a>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                </div>
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>


@endsection
@push('js')

@endpush
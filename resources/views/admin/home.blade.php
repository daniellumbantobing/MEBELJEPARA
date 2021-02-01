@extends('layouts.master')
@section('content')
<div class="main">

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="">
                <div class="panel-body">
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="metric panel">
                                <span class="icon"><i class="fa fa-download"></i></span>
                                <p>
                                    <span class="number">1,252</span>
                                    <span class="title">Downloads</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number">203</span>
                                    <span class="title">Sales</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">274,678</span>
                                    <span class="title">Visits</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel">
                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                <p>
                                    <span class="number">35%</span>
                                    <span class="title">Conversions</span>
                                </p>
                            </div>
                        </div>
                    </div>

                  
                </div>
            </div>
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@endsection

@section('footer')
   <style>
       .panel{
           border-radius : 10px;
       }
   </style>
@endsection
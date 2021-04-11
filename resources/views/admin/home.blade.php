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
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-user"></i></i></span>
                                <p>
                                    <span class="number">{{customer()}}</span>
                                    <span class="title">Pelanggan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-archive"></i></i></span>
                                <p>
                                    <span class="number">{{totalproduk()}}</span>
                                    <span class="title">Produk</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-pen"></i></i></span>
                                <p>
                                    <span class="number">{{order()}}</span>
                                    <span class="title">Order</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-dollar-sign"></i></i></span>
                                <p>
                                    <span class="number" style="font-size: 20px;">@currency(revenue())</span>
                                    <span class="title">Revenue</span>
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
   
@endsection
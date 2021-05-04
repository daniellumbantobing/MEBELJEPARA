@extends('layouts.master')
@section('title','Laporan Penjualan')
@section('content')
   <div class="main">
        <div class="main-content">
            <div class="container-fluid">
            
            <div class="row">
						<div class="col-md-6 col-6">
						   
                            <div class="panel panel-headline" style="border-radius: 20px;">
								<div class="panel-heading">
									<h3 class="panel-title">Filter</h3>
						           <div class="right">
                         
								   </div>
                        
                   
								</div>
								<div class="panel-body">
									<h4>Total Pendapatan</h4>
									<hr/>
									<h4>@currency($d)</h4>
									<hr/>
									<h4>Total Transaksi</h4>
									<hr/>
									<h4>{{$d1}}</h4>
									
								</div>
							</div>

            
							
						</div>

						<div class="col-md-6 col-6">
						   
                            <div class="panel panel-headline" style="border-radius: 20px;">
								<div class="panel-heading">
									<h3 class="panel-title">Laporan Penjualan</h3>
						           <div class="right">
                         
								   </div>
                        
                   
								</div>
								<div class="panel-body">
									<h4>Total Pendapatan</h4>
									<hr/>
									<h4>@currency($d)</h4>
									<hr/>
									<h4>Total Transaksi</h4>
									<hr/>
									<h4>{{$d1}}</h4>
									
								</div>
							</div>

            
			</div>
		</div>
	</div>
</div>
                      
 @endsection
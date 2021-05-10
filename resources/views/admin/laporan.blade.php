@extends('layouts.master')
@section('title','Laporan Penjualan')
@section('content')
   <div class="main">
        <div class="main-content">
            <div class="container-fluid">
            
            <div class="row">
				
			
			
				<div class="col-md-12 col-12">
						   
                            <div class="panel panel-headline" style="border-radius: 20px;">
								<div class="panel-heading mt-3">
									<center>
									<h3 class="panel-title">
									Laporan Penjualan Produk Biasa 
									</h3>
									</center>
                   
								</div>
							
							</div>

            
			</div>
						<div class="col-md-6 col-6">
						   
                            <div class="panel panel-headline" style="border-radius: 20px;">
								<div class="panel-heading">
									<h3 class="panel-title">Filter</h3>
						           <div class="right">
                         
								   </div>
                        
                   
								</div>
								<div class="panel-body">
								<form action="{{url('/filter/laporanpenjualan')}}" method="GET" class="form-group">
									@csrf
									
									<select style="cursor:pointer;" class="form-control" id="tag_select" name="hari">
									<option value="0" selected disabled> Pilih Tanggal</option>
									<?php 
									$year =31;
									$min = 1;
									$max = $year;
									for( $i=$min; $i<=$max; $i++ ) {
									echo '<option value='.$i.'>'.$i.'</option>';
														}
														?>
									</select>

								
									
									

									
									<select style="cursor:pointer;margin-top:1.5em;margin-bottom:1.5em;" class="form-control" id="tag_select" name="bulan">
										<option value="0" selected disabled> Pilih Bulan</option>
									<option value="01"> Januari</option>
									<option value="02"> Februari</option>
									<option value="03"> Maret</option>
									<option value="04"> April</option>
									<option value="05"> Mei</option>
									<option value="06"> Juni</option>
									<option value="07"> Juli</option>
									<option value="08"> Agustus</option>
									<option value="09"> September</option>
									<option value="10"> Oktober</option>
									<option value="11"> November</option>
									<option value="12"> Desember</option>
									</select>
													
									<select style="cursor:pointer;" class="form-control" id="tag_select" name="tahun">
									<option value="0" selected disabled> Pilih Tahun</option>
									<?php 
									$year = date('Y');
									$min = $year - 60;
									$max = $year;
									for( $i=$max; $i>=$min; $i-- ) {
									echo '<option value='.$i.'>'.$i.'</option>';
														}
														?>
									</select>
									<br>
									<input class="btn btn-primary btn-block" name="submit" type="submit" value="Cari"/>
								</form>
									
								</div>
							</div>

            
							
						</div>

						<div class="col-md-6 col-6">
						   
                            <div class="panel panel-headline" style="border-radius: 20px;">
								<div class="panel-heading">
									<h3 class="panel-title">
										@if (!@empty($request->hari) && !@empty($request->bulan) && !@empty($request->tahun))
										Hasil Pencarian	 "{{$request->hari}} {{$request->bulan}} {{$request->tahun}}"
										@elseif(!@empty($request->bulan) && !@empty($request->tahun))
										Hasil Pencarian		"{{$request->bulan}} 	{{$request->tahun}}"
										@else
										Laporan Penjualan (Hari Ini)
										@endif
									</h3>
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

			<div class="col-md-12">
							<div class="panel">
								<div id="chartnilai">
									
								</div>
							</div>
						</div>
		</div>
	</div>
</div>
                      
 @endsection

 @section('footer')
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script>
		Highcharts.chart('chartnilai', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Laporan Penjualan'
	    },
	    xAxis: {
	        categories:{!!json_encode($tgl)!!},
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Order'
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Total Pendapatan',
	        data: {!!json_encode($total)!!}
 
	    }] 
	}); 

	$(document).ready(function() {
    $('.nilai').editable();
}); 	
</script>
 @endsection
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
								<form action="" method="GET" class="form-group">
	@csrf
     <select style="cursor:pointer;" class="form-control" id="tag_select" name="year">
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
     <select style="cursor:pointer;margin-top:1.5em;margin-bottom:1.5em;" class="form-control" id="tag_select" name="month">
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
					
	<input class="btn btn-default btn-block" name="submit" type="submit" value="Cari Data Arsip"/>
</form>
									
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
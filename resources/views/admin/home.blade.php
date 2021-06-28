@extends('layouts.master')
@section('header')

@section('content')
<div class="main">

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="">
                <div class="">
                    <div class="rows">
                        <div class="col-md-3">
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-user"></i></i></span>
                                <p>
                                    <span class="number">{{customer()}}</span>
                                    <span class="title">Pelanggan</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-archive"></i></i></span>
                                <p>
                                    <span class="number">{{totalproduk()}}</span>
                                    <span class="title">Produk</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-pen"></i></i></span>
                                <p>
                                    <span class="number">{{order()}}</span>
                                    <span class="title">Order</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric panel" style="border-radius:20px;">
                                <span class="icon"><i class="fas fa-dollar-sign"></i></i></span>
                                <p>
                                    <span class="number" style="font-size: 22px;">@currency(revenue())</span>
                                    <span class="title">Revenue</span>
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                    </svg>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                     
   <div class="col-md-12">
   
                   
							<div class="panel">
								<div id="produk">
									
								</div>
							</div>

   
       <div class="row">
                        <div class="col-md-6">
							<div class="panel">
								<div id="tempaan">
									
								</div>
							</div>
						</div>
                         <div class="col-md-6">
							<div class="panel">
								<div id="reparasi">
									
								</div>
							</div>
						</div>
                        </div>
                        

                         <div class="">
                  
                            		<div class="panel">
								<div class="panel-heading">
									<h4 style="color:black;">Produk yang Banyak Terjual</h4>
                                         
								</div>
                             
								<div class="panel-body">
								<div class="row slider">
                                   
                                    	@foreach ($produk as $key=>$p)
                                            <?php
                                                $pro= \App\Produk::where('id',$p->produk_id)->get();
                                            ?>
                                            @foreach ($pro as $s)
                                <div class="col-md-12">
                                    <div class="card card-img">
                                         <img src="{{url('images/'.$s->gambar)}}" class="card-img-top img-fluid" style="width: 100%;">
                        </a>
                        <div class="card-body text-center">
                            <h6 class="card-title" style="color:#CAA563;">{{$s->nama_produk}}</h6>
                            <h6 class="card-text">@currency($s->harga)</h6>
                            <h6 class="card-text">Terjual {{$p->jumlah}}</h6>
                            
                            <h6 class="card-text">Stok {{$s->qty}}</h6>
                           
                           
                        </div>
                                        </div>
                                </div>

                                   @endforeach
                                            
                                            @endforeach
                       
                            </div>
									</table>
								</div>
							</div>
                         </div>
                </div>
           

            
            <!-- END OVERVIEW -->
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
	</div>
@endsection

@section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" 
integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" 
crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" 
integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" 
integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
$('.slider').slick({
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: false,
       
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
       
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
}); 
</script>
 
<script>
		Highcharts.chart('produk', {
	    chart: {
	        type: ''
	    },
	    title: {
	        text: 'Laporan Penjualan Biasa'
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


</script>

<script>
		Highcharts.chart('tempaan', {
	    chart: {
	        type: ''
	    },
	    title: {
	        text: 'Laporan Penjualan Tempahan'
	    },
	    xAxis: {
	        categories:{!!json_encode($tglTempaan)!!},
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
	        data: {!!json_encode($totalTempaan)!!}
 
	    }] 
	}); 

	
</script>

<script>
		Highcharts.chart('reparasi', {
	    chart: {
	        type: ''
	    },
	    title: {
	        text: 'Laporan Penjualan Reparasi'
	    },
	    xAxis: {
	        categories:{!!json_encode($tglReparasi)!!},
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
	        data: {!!json_encode($totalReparasi)!!}
 
	    }] 
	}); 

	$(document).ready(function() {
    $('.nilai').editable();
}); 	
</script>
<style>
    .slick-next:before, .slick-prev:before {
    font-size: 30px;
    opacity: 10;
    color: #a79292;
}
</style>
@endsection
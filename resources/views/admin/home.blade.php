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
                        <div class="col-md-12" style="margin-top: 150px;">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Produk yang Banyak Terjual</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>No</th>
												<th>Produk</th>
                                                <th>Kategori</th>
                                        		<th>Stok</th>
												<th>Terjual</th>
                                                <th>Harga</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($produk as $key=>$p)
                                            <?php
                                                $pro= \App\Produk::where('id',$p->produk_id)->get();
                                            ?>
                                            @foreach ($pro as $s)
                                            
                                                <tr>
												<td>{{++$key}}</td>
												<td>
                                                     <img src="/images/{{$s->gambar}}" alt="Avatar" class="img-fluid" style="width: 8rem;">
                                                     {{$s->nama_produk}}
                                                </td>
                                                <td>{{$s->kategori->nama_kategori}}</td>
												<td>{{$s->qty}}</td>
												<td>{{$p->jumlah}}</td>
                                                <td>@currency($s->harga)</td>
											</tr>
                                            @endforeach
                                            
                                            @endforeach
                                            

										</tbody>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
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
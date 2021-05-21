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


                        <div class="col-md-12" style="margin-top: 120px;">
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
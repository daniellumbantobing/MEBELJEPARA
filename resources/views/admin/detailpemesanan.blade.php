@extends('layouts.master')
@section('content')
   <div class="main">
        <div class="main-content">
            <div class="container-fluid">

            <div class="row">
						<div class="col-md-7">
						   
                      <div class="panel panel-headline" style="border-radius: 20px;">
						<div class="panel-heading">
							<h3 class="panel-title">Pemesanan #{{$det_pes->id}}</h3>
							<p class="panel-subtitle">Tanggal Pemesanan: {{$det_pes->created_at->format('d M Y  H:i')}}</p>
						<hr/>
                            <table class="table">
                                 
                                <thead>
                               
                                    <tr>
                              
                                <th style="border:none;"></th>
                                <th style="border:none;"></th>
                                <th style="border:none;"></th>    
                                <th style="border:none;"></th>    
                                </tr>    
                                
                                </thead>
                                <tbody>
                                    <?php  $total_pesanan = 0;?>
                                @foreach($det_pes->pemesananproduk as $pro) 
                                <tr style="border:none;">
                                <td style="border:none;">  <img src="{{url('images/'.$pro->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px;"></td>
                                <td style="border:none;">{{$pro->produk->nama_produk}}</td>
                                <td style="border:none;">{{$pro->qty}}</td>  
                                <td style="border:none;">@currency($pro->harga)</td>     
                            </tr>
                             <?php  $total_pesanan = $total_pesanan+$pro->qty;?>
                                 @endforeach 
                             
                                </tbody>
                                     
                            </table>   
                            
                           <hr/>

                           <div>
                             <ul class="list-unstyled list-justify">
										
                                            <li>Status Pembayaran <span>{{$det_pes->status_pembayaran}}</span></li>
											<li>Status Pemesanan<span>{{$det_pes->status_pemesanan}}</span></li>
											<li>Metode Pembayaran<span>Transfer Bank {{$det_pes->transfer_bank}}</li>
                                            <li>Jumlah Pesanan<span>{{$total_pesanan}}</span></li>
                                            <li>Total <span style="font-size: 18px; font-weight:bold;">@currency($det_pes->total_harga)</span></li>
                                            
                                            </ul>
                            </div>

                            <hr/>
                            <div>
                                <h4>Bukti Pembayaran</h4>
                                @if(!empty($det_pes->buktipembayaran->tanggal_dikirim))
                                <h5>  Tanggal Pembayaran: {{Carbon\Carbon::parse($det_pes->buktipembayaran->tanggal_dikirim)->format('d M Y')}} {{$det_pes->buktipembayaran->created_at->format('H:i')}}</h5>
                                
                                  <p>	<iframe src="{{url('buktipembayaran/'.$det_pes->buktipembayaran->gambar)}}" style="width: 100%; height: 640px;"></iframe>
                                </p>

                                <a href="/files/download/{{$det_pes->buktipembayaran->gambar}}" class="btn" ><i class="fa fa-download"></i></a>
                            @endif
                            </div>
                        </div>
					
                        

					</div>

                  
						</div>
						<div class="col-md-5">
						   
                      <div class="panel panel-headline" style="border-radius: 20px;">
						<div class="panel-heading">
							<h3 class="panel-title">Customer</h3>
							<h4>{{$det_pes->user->nama_depan}}  {{$det_pes->user->nama_belakang}}
                            <br>  {{$det_pes->user->no_hp}}
                            <br>  {{$det_pes->user->email}}
                            </h4>
					
                            <hr/>
                        	<h4>Alamat Pengiriman<br>
                   
                        <br>{{$det_pes->user->alamat}} ,{{$det_pes->user->nama_kota}}, 
                        <br>{{$det_pes->user->nama_prov}}
                        <br>{{$det_pes->user->kode_pos}} </h4>
                        </div>
					
                        

					</div>

                  
					</div>
          
            </div>
           

        </div>
   </div>   


 @endsection
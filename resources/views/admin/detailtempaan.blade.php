@extends('layouts.master')
@section('content')
   <div class="main">
        <div class="main-content">
            <div class="container-fluid">

            <div class="row">
						<div class="col-md-7">
						   
                      <div class="panel panel-headline" style="border-radius: 20px;">
						<div class="panel-heading">
							<div class="panel-heading">
                            <h3 class="panel-title">Pemesanan Tempaan#{{$det_tempaan->id}}</h3>
							<p class="panel-subtitle">
                                {{$det_tempaan->nama_tempaan}}
                                <br>Tanggal Pemesanan: {{$det_tempaan->created_at->format('d M Y  H:i')}}</p>

                            <div style="float: right;">
                                    @if (empty($det_tempaan->biaya))
                                      <a type="button" class="btn btn-primary" style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;" data-toggle="modal" data-target="#exampleModal">Buat Biaya Tempaan</a>
                                    @elseif(!empty($det_tempaan->biaya))
                                      <a type="button" class="btn btn-primary" style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;" data-toggle="modal" data-target="#exampleModal">Edit Biaya Tempaan</a>
                                      @elseif($det_tempaan->biaya == 0)
                                      <a type="button" class="btn btn-primary" style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;" data-toggle="modal" data-target="#exampleModal">Edit Biaya Tempaan</a>
                                      
                                    @endif
                                                            
                            </div>
                            </div>
                    
                            @if (!empty($det_tempaan->produk_id))
                                
                           
                        <hr/>
                        <h5>Produk Semula</h5>
                            {{-- Produk Semula --}}
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
                                <tr style="border:none;">
                                <td style="border:none;">  
                                <a href="/images/{{$det_tempaan->produk->gambar}}" target="blank_">    
                                <img src="/images/{{$det_tempaan->produk->gambar}}" alt="produk" class="card-img-top img-fluid" style="width: 80px;">
                                </a>
                              
                                </td>
                                <td style="border:none;">{{$det_tempaan->produk->nama_produk}}</td>
                                <td style="border:none;">{{$det_tempaan->qty}}</td>  
                                <td style="border:none;">@currency($det_tempaan->produk->harga)</td>     
                            </tr>
                             
                                </tbody>
                                     
                            </table>  
                             @endif
						<hr/>
                        
                        <h5>Request Pelanggan</h5>
                        
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
                                   
                                
                                <tr style="border:none;">
                                <td style="border:none;">  
                                <a href="/tempaan/{{$det_tempaan->gambar1}}" target="blank_">    
                                <img src="/tempaan/{{$det_tempaan->gambar1}}" alt="produk" class="card-img-top img-fluid" style="width: 80px;">
                                </a>
                                @if (!empty($det_tempaan->gambar2))
                                <a href="/tempaan/{{$det_tempaan->gambar2}}" target="blank_">   
                                <img src="/tempaan/{{$det_tempaan->gambar2}}" alt="produk" class="card-img-top img-fluid" style="width: 80px;">
                                </a>
                               @endif
                               @if (!empty($det_tempaan->gambar3))
                                <a href="/tempaan/{{$det_tempaan->gambar3}}" target="blank_">   
                                <img src="/tempaan/{{$det_tempaan->gambar3}}" alt="produk" class="card-img-top img-fluid" style="width: 80px;">
                                </a>
                                @endif
                                </td>
                                <td style="border:none;">{{$det_tempaan->nama_produk}}</td>
                                <td style="border:none;">{{$det_tempaan->qty}}</td>  
                                <td style="border:none;">@currency($det_tempaan->biaya)</td>     
                            </tr>
                             
                                </tbody>
                                     
                            </table>   
                            
                           <hr/>
                            
                           <div>
                             <ul class="list-unstyled list-justify">
										
                                            <li>Status Pembayaran <span>{{$det_tempaan->status_pembayaran}}</span></li>
											<li>Status Pemesanan<span>{{$det_tempaan->status_pemesanan}}</span></li>
											<li>Metode Pembayaran<span>Transfer Bank {{$det_tempaan->transfer_bank}}</li>
                                            <li>Jumlah Pesanan<span>{{$det_tempaan->jumlah}}</span></li>
                                            <li>Total <span style="font-size: 18px; font-weight:bold;">@currency($det_tempaan->biaya*$det_tempaan->jumlah)</span></li>
                                            
                                            </ul>
                            </div>

                            <hr/>
                            <div>
                                <h4>Bukti Pembayaran</h4>
                                @if(!empty($det_tempaan->buktipembayarantemp->tanggal_dikirim))
                                <h5>  Tanggal Pembayaran: {{Carbon\Carbon::parse($det_tempaan->buktipembayarantemp->tanggal_dikirim)->format('d M Y')}} {{$det_tempaan->buktipembayarantemp->created_at->format('H:i')}}</h5>
                                
                                  <p>	<iframe src="{{url('buktipembayaran/'.$det_tempaan->buktipembayarantemp->gambar)}}" style="width: 100%; height: 640px;"></iframe>
                                </p>
                                
                                <a href="/files/download/{{$det_tempaan->buktipembayarantemp->gambar}}" class="btn" ><i class="fa fa-download"></i></a>
                            @endif
                            </div>
                        </div>
					
                        

					</div>

                  
						</div>
						
                        
                        <div class="col-md-5">
						   
                      <div class="panel panel-headline" style="border-radius: 20px;">
						<div class="panel-heading">
							<h3 class="panel-title">Penerima</h3>
							<h4>{{$det_tempaan->nama_penerima}} 
                            <br>  {{$det_tempaan->no_hp}}
                            </h4>
					
                            <hr/>
                        	<h4>Alamat Pengiriman<br>
                   
                        <br>{{$det_tempaan->alamat}}
                        <br>{{$det_tempaan->kode_pos}} </h4>
                        </div>
					
                        

					</div>

                  
					</div>
          
            </div>
           

        </div>
   </div>   

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form action="/biaya/{{$det_tempaan->id}}/tempaan" method="POST"  enctype="multipart/form-data">
                               @csrf
                              
                             <div class="form-group{{$errors->has('biaya') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">biaya(Rp)</label>
                                <input name="biaya" type="text" class="form-control" id="masking2" aria-describedby="emailHelp" placeholder="Biaya" value="{{$det_tempaan->biaya}}">
                                @if($errors->has('biaya'))
                                    <span class="help-block">{{$errors->first('biaya')}}</span>
                                @endif
                              
                                 
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" style="float:left; border-radius:10px; background-color:#ffff; border-color:#CAA563;" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"  style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;">Submit</button>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>	

 @endsection


 @section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script type="text/javascript">


$(document).ready(function(){
    $('#masking2').mask('#.##0', {reverse: true});
    
})
</script>


@endsection
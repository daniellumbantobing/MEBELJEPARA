@extends('dashboard.main')
@section('title','Pemesanan')
@section('main')
   <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 profil">
                 <p style="color:#A1A1A1;">
               <span style="color:#CAA563;"> {{$profil->nama_depan}} {{$profil->nama_belakang}}</span>
            <br>{{$profil->jenis_kelamin}}
            </p> <hr/>
                    <ul >
                        <li class="">
                            <a href="/profil" class="">Profil Saya</a>
                        </li>
                        
                        <li>
                            <a href="/pemesanan">Pesanan</a>
                        </li>
                        <li>
                            <a href="">Whishlist</a>
                        </li>
                       
                        
                    </ul>

            </div>
             @if(!empty($p_biasa || $tempaan || $reparasi))  
            <div class="col-12 col-md-8 profil1">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Dibatalkan</a>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
         
                  
    <ul class="nav nav-tabs mt-2 pad" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:20px;"  id="biasa-tap" data-toggle="tab" href="#Biasa" role="tab" aria-controls="Biasa" aria-selected="true">Biasa</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-primary" id="tempaan-tap" style="background-color: #CAA563; border-color:#CAA563; border-radius:20px;" data-toggle="tab" href="#tempaan" role="tab" aria-controls="tempaan" aria-selected="false">tempaan</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-primary" id="reparasi-tap" style="background-color: #CAA563; border-color:#CAA563; border-radius:20px;" data-toggle="tab" href="#reparasi" role="tab" aria-controls="reparasi" aria-selected="false">reparasi</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="Biasa" role="tabpanel" aria-labelledby="biasa-tap">
    {{-- Produk Biasa  semua--}}
                 <div class="mt-3">
                    @foreach ($p_biasa as $p) 
                  
                    <div class="card shadow mt-3" style="border-radius: 20px;">
                    <div class="card-body">
 <table class="table">
  <tbody>
     
    <tr>
      <td style="border:none; font-size:12px; font-weight:bold; color:#858585;">
          Nomor Pesanan #{{$p->id}}<br>
        {{$p->created_at->format('d M Y  H:i')}} 
    </td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
    </tr>
    <tr>
      <td scope="row">
            @foreach($p->pemesananproduk as $pro)   
               
              <img src="{{url('images/'.$pro->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
            
            @endforeach 
        </td>
      <td style="color:#858585;">@currency($p->total_harga)</td>
     
      <td style="color:#858585;">{{$p->transfer_bank}}</td>
      <td style="color:#CAA563;"> 
       
         @if($p->status_pemesanan == "Dikirim")
            Dikirim
        @elseif($p->status_pemesanan == "Batal Dikirim")  
        Dibatalkan    
        @elseif($p->status_pembayaran == "Sudah Dibayar")  
        Pembayaran Diproses
        
       @elseif($p->status_pembayaran == "Belum Dibayar")
        {{$p->status_pembayaran}}
        
         @endif
       
      </td>
    </tr>
    <tr>
      <td scope="row"><a href="/detail" data-toggle="modal" data-target="#exampleModalBiasa{{$p->id}}"><i class="far fa-eye"></a></i></th>
      <td></td>
      <td></td>
      <td>
            @if($p->status_pembayaran == "Belum Dibayar")
            <a href="/konfirm/{{$p->id}}" class="btn btn-primary btn-sm"  style="color:white; background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Bayar Sekarang</a>
            @endif    
    </td>
    </tr>

  </tbody>

</table>
                    
                    </div>
                      </div>  
                         @endforeach


                
                    </div>
                    <div class="float-right mt-4">
                        {{ $p_biasa->links() }}
                        </div>


                        @foreach ($p_biasa as $p) 
    {{-- Modal --}}
<div class="modal fade" id="exampleModalBiasa{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <td scope="col" style="border:none;"> <span style="color: #858585;">No Pesanan</span><br> 
       #{{$p->id}}
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;"> Tanggal Pesanan</span><br>{{$p->created_at->format('d M Y  H:i')}} 
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;">Metode Pembayaran</span><br> Transfer Bank {{$p->transfer_bank}}
      </td>
     
    </tr>
  </thead>
  <tbody>
     @foreach($p->pemesananproduk as $pro)   
    <tr>
      <th scope="row">
      <a href="/produk/{{$pro->produk->id}}/detail">
        <img src="{{url('images/'.$pro->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
      </a>
      </th>
      <td style="color: #858585"> 
        {{$pro->produk->nama_produk}}<br><span style="font-size: 12px;">@currency($pro->produk->harga)<br>{{$pro->qty}}</span>
      </td>
      <td>
        <span style="font-size: 12px; color: #858585;">Total Harga</span>
        <br> <span class="text-prim">@currency($pro->produk->harga * $pro->qty)</span>
      </td>
    @endforeach 

    </tr>
    
    <tr>
      <td scope="row" class="font2" colspan="3">
        Alamat Pengiriman<br>
                <span class="font3">     
              <span style="font-weight: bold;"> {{$p->user->nama_depan}} {{$p->user->nama_belakang}}</span>
                      <br>
                   
                      {{$p->alamat}}, {{$p->nama_kota}}, 
                     {{$p->nama_prov}},
                     {{$p->kode_pos}}</span>
    </td>
      

    </tr>
    <tr>
      <td scope="row" colspan="2" class="font3">Pembayaran<br>
      <span style="color: #858585">
       Total
      </span>
      </td>
      <td style="font-weight: bold; color:#858585;" class="font3"><br>@currency($p->total_harga)</td>
      
    </tr>
  </tbody>
</table>
        
      </div>
      
    </div>
  </div>
</div>
@endforeach
  </div>
  
  
  <div class="tab-pane fade" id="tempaan" role="tabpanel" aria-labelledby="tempaan-tap">
    {{-- Tempaan --}}

      <div class="mt-3">
                    @foreach ($tempaan as $p) 
                  
                    <div class="card shadow mt-3" style="border-radius: 20px;">
                    <div class="card-body">
 <table class="table">
  <tbody>
     
    <tr>
      <td style="border:none; font-size:12px; font-weight:bold; color:#858585;">
          Nomor Pesanan #{{$p->id}}<br>
        {{$p->created_at->format('d M Y  H:i')}} 
    </td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
    </tr>
    <tr>
      <td scope="row">
            <img src="{{url('tempaan/'.$p->gambar1)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
            @if(!empty($p->gambar2))
            <img src="{{url('tempaan/'.$p->gambar2)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
            @endif
            @if(!empty($p->gambar3))
            <img src="{{url('tempaan/'.$p->gambar3)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
            @endif
           
        </td>
      <td style="color:#858585;">
          {{$p->nama_tempaan}}<br>
        <span style="font-size: 12px;">@currency($p->biaya)</span>
      </td>
     
      <td style="color:#858585;">{{$p->transfer_bank}}</td>
      <td style="color:#CAA563;"> 
        @if($p->status_pemesanan == "Dikirim")
            Dikirim
        @elseif($p->status_pemesanan == "Batal Dikirim")  
        Dibatalkan    
        @elseif($p->status_pembayaran == "Sudah Dibayar")  
        Pembayaran Diproses
        
       @elseif($p->status_pembayaran == "Belum Dibayar")
        {{$p->status_pembayaran}}
        
         @endif
      </td>
    </tr>
    <tr>
      <td scope="row"><a href="/detail" data-toggle="modal" data-target="#tempaan{{$p->id}}"><i class="far fa-eye"></a></i></th>
      <td></td>
      <td></td>
      <td>
            @if($p->status_pembayaran == "Sudah Dibayar")

            @elseif(!empty($p->biaya))
            <a href="/konfirm/{{$p->id}}/tempaan" class="btn btn-primary btn-sm"  style="color:white; background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Bayar Sekarang</a>
           

            @endif    
    </td>
    </tr>

  </tbody>

</table>
                    
                    </div>
                      </div>  
                         @endforeach


                
                    </div>
                    <div class="float-right mt-4">
                        {{ $tempaan->links() }}
                        </div>

  </div>

  
  <div class="tab-pane fade" id="reparasi" role="tabpanel" aria-labelledby="reparasi-tap">
    {{-- Reparasi --}}
       <div class="mt-3">
                    @foreach ($reparasi as $p) 
                  
                    <div class="card shadow mt-3" style="border-radius: 20px;">
                    <div class="card-body">
 <table class="table">
  <tbody>
     
    <tr>
      <td style="border:none; font-size:12px; font-weight:bold; color:#858585;">
          Nomor Pesanan #{{$p->id}}<br>
        {{$p->created_at->format('d M Y  H:i')}} 
    </td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
    </tr>
    <tr>
      <td scope="row">
            <img src="{{url('reparasi/'.$p->gambar1)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
            @if(!empty($p->gambar2))
            <img src="{{url('reparasi/'.$p->gambar2)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
            @endif
            @if(!empty($p->gambar3))
            <img src="{{url('reparasi/'.$p->gambar3)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
            @endif
           
        </td>
      <td style="color:#858585;">
          {{-- {{$p->jenis_keri}}<br> --}}
        <span style="font-size: 15px;">@currency($p->biaya)</span>
      </td>
     
      <td style="color:#858585;">{{$p->transfer_bank}}</td>
      <td style="color:#CAA563;"> 
        @if($p->status_pemesanan == "Dikirim")
        Dikirim
        @elseif($p->status_pemesanan == "Batal Dikirim")  
        Dibatalkan    
        @elseif($p->status_pemesanan == "Dibatalkan")
        Dibatalkan 
        @elseif($p->status_pembayaran == "Sudah Dibayar")  
        Pembayaran Diproses
        
       @elseif($p->status_pembayaran == "Belum Dibayar")
        Menunggu Konfirmasi
         @endif
      </td>
    </tr>
    <tr>
      <td scope="row"><a href="/detail" data-toggle="modal" data-target="#reparasi{{$p->id}}"><i class="far fa-eye"></a></i></th>
      <td colspan="2">
         @if($p->status_pemesanan == "Dibatalkan")
          <p style="color: #858585;">{{$p->ket_reparasi}}</p>
        
      </td>
       <td></td>
             <td></td>
        @endif 
             <td>
            @if($p->status_pembayaran == "Sudah Dibayar")

            @elseif(!empty($p->biaya))
            <a href="/konfirm/{{$p->id}}/reparasi" class="btn btn-primary btn-sm"  style="color:white; background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Bayar Sekarang</a>
           

            @endif    
    </td>
    </tr>

  </tbody>

</table>
                    
                    </div>
                      </div>  
                         @endforeach


                
                    </div>
                    <div class="float-right mt-4">
                        {{ $tempaan->links() }}
                        </div>
  </div>




</div>



                </div>
                


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                {{-- Dikirim --}}



    <ul class="nav nav-tabs mt-2 pad" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:20px;"  id="biasa-dikirim-tap" data-toggle="tab" href="#biasa_dikirim" role="tab" aria-controls="biasa_dikirim" aria-selected="true">Biasa</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-primary" id="tempaan-dikirim-tap" style="background-color: #CAA563; border-color:#CAA563; border-radius:20px;" data-toggle="tab" href="#tempaan_dikirim" role="tab" aria-controls="tempaan_dikirim" aria-selected="false">Tempaan Dikirim</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-primary" id="reparasi-dikirim-tap" style="background-color: #CAA563; border-color:#CAA563; border-radius:20px;" data-toggle="tab" href="#reparasi_dikirim" role="tab" aria-controls="reparasi_dikirim" aria-selected="false">Reparasi Dikirim</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="biasa_dikirim" role="tabpanel" aria-labelledby="biasa-dikirim-tap">
    <!-- Biasa dikirim -->
                        
    <div class="mt-5">
                            @foreach ($p_biasa1 as $p) 
                          
                            <div class="card shadow mt-3" style="border-radius: 20px;">
                            <div class="card-body">
          <table class="table">
          <tbody>
              
            <tr>
              <td style="border:none; font-size:12px; font-weight:bold; color:#858585;">
                  Nomor Pesanan #{{$p->id}}<br>
                {{$p->created_at->format('d M Y  H:i')}} 
            </td>
              <td style="border:none;"></td>
              <td style="border:none;"></td>
              <td style="border:none;"></td>
            </tr>
            <tr>
              <td scope="row">
                    @foreach($p->pemesananproduk as $pro)   
                      <img src="{{url('images/'.$pro->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
                    @endforeach 
                </td>
              <td style="color:#858585;">@currency($p->total_harga)</td>
              
              <td style="color:#858585;">{{$p->transfer_bank}}</td>
              <td style="color:#CAA563;"> 
              {{$p->status_pemesanan}}
                  
              </td>
            </tr>
            <tr>
            <td scope="row"><a href="/detail" data-toggle="modal" data-target="#biasaDikirim{{$p->id}}"><i class="far fa-eye"></a></i></th>
     
              <td></td>
              <td></td>
              <td>
                    @if($p->status_pembayaran == "Belum Dibayar")
                    <a href="/konfirm/{{$p->id}}" class="btn btn-primary btn-sm"  style="color:white; background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Bayar Sekarang</a>
                    @endif    
            </td>
            </tr>

          </tbody>

        </table>
                            
                            </div>
                              </div>  
                                  @endforeach
                                      </div>


                                      
   @foreach ($p_biasa1 as $p) 
    {{-- Modal --}}
<div class="modal fade" id="biasaDikirim{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <td scope="col" style="border:none;"> <span style="color: #858585;">No Pesanan</span><br> 
       #{{$p->id}}
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;"> Tanggal Pesanan</span><br>{{$p->created_at->format('d M Y  H:i')}} 
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;">Metode Pembayaran</span><br> Transfer Bank {{$p->transfer_bank}}
      </td>
     
    </tr>
  </thead>
  <tbody>
     @foreach($p->pemesananproduk as $pro)   
    <tr>
      <th scope="row">
         <img src="{{url('images/'.$pro->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
      </th>
      <td style="color: #858585"> 
        {{$pro->produk->nama_produk}}<br><span style="font-size: 12px;">@currency($pro->produk->harga)<br>{{$pro->qty}}</span>
      </td>
      <td>
        <span style="font-size: 12px; color: #858585;">Total Harga</span>
        <br> <span class="text-prim">@currency($pro->produk->harga * $pro->qty)</span>
      </td>
    @endforeach 

    </tr>
    
    <tr>
      <td scope="row" class="font2" colspan="3">
        Alamat Pengiriman<br>
                <span class="font3">     
              <span style="font-weight: bold;"> {{$p->user->nama_depan}} {{$p->user->nama_belakang}}</span>
                      <br>
                   
                      {{$p->alamat}}, {{$p->nama_kota}}, 
                     {{$p->nama_prov}},
                     {{$p->kode_pos}}</span>
    </td>
      

    </tr>
    <tr>
      <td scope="row" colspan="2" class="font3">Pembayaran<br>
      <span style="color: #858585">
       Total
      </span>
      </td>
      <td style="font-weight: bold; color:#858585;" class="font3"><br>@currency($p->total_harga)</td>
      
    </tr>
  </tbody>
</table>
        
      </div>
      
    </div>
  </div>
</div>
@endforeach

  </div>

  <div class="tab-pane fade" id="tempaan_dikirim" role="tabpanel" aria-labelledby="tempaan-dikirim-tap">da2</div>
  <div class="tab-pane fade" id="reparasi_dikirim" role="tabpanel" aria-labelledby="reparasi-dikirim-tap">da3</div>
</div> 
</div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                 {{-- Batal  --}}
                                <div class="mt-5">
                    @foreach ($p_biasa2 as $p) 
                  
                    <div class="card shadow mt-3" style="border-radius: 20px;">
                    <div class="card-body">
 <table class="table">
  <tbody>
     
    <tr>
      <td style="border:none; font-size:12px; font-weight:bold; color:#858585;">
          Nomor Pesanan #{{$p->id}}<br>
        {{$p->created_at->format('d M Y  H:i')}} 
    </td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
      <td style="border:none;"></td>
    </tr>
    <tr>
      <td scope="row">
            @foreach($p->pemesananproduk as $pro)   
              <img src="{{url('images/'.$pro->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
           @endforeach 
        </td>
      <td style="color:#858585;">@currency($p->total_harga)</td>
     
      <td style="color:#858585;">{{$p->transfer_bank}}</td>
      <td style="color:#CAA563;"> 
      @if($p->status_pemesanan)
          Dibatalkan
      @endif
          
      </td>
    </tr>
    <tr>
      <td scope="row"><a href="/detail" data-toggle="modal" data-target="#biasaBatal{{$p->id}}"><i class="far fa-eye"></a></i></th>
      <td></td>
      <td></td>
      <td>
            @if($p->status_pembayaran == "Belum Dibayar")
            <a href="/konfirm/{{$p->id}}" class="btn btn-primary btn-sm"  style="color:white; background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Bayar Sekarang</a>
            @endif    
    </td>
    </tr>

  </tbody>

</table>
                    
                    </div>
                      </div>  
                         @endforeach
                    </div>

                      
   @foreach ($p_biasa2 as $p) 
    {{-- Modal --}}
<div class="modal fade" id="biasaBatal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <td scope="col" style="border:none;"> <span style="color: #858585;">No Pesanan</span><br> 
       #{{$p->id}}
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;"> Tanggal Pesanan</span><br>{{$p->created_at->format('d M Y  H:i')}} 
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;">Metode Pembayaran</span><br> Transfer Bank {{$p->transfer_bank}}
      </td>
     
    </tr>
  </thead>
  <tbody>
     @foreach($p->pemesananproduk as $pro)   
    <tr>
      <th scope="row">
         <img src="{{url('images/'.$pro->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 60px; height:60px;">
      </th>
      <td style="color: #858585"> 
        {{$pro->produk->nama_produk}}<br><span style="font-size: 12px;">@currency($pro->produk->harga)<br>{{$pro->qty}}</span>
      </td>
      <td>
        <span style="font-size: 12px; color: #858585;">Total Harga</span>
        <br> <span class="text-prim">@currency($pro->produk->harga * $pro->qty)</span>
      </td>
    @endforeach 

    </tr>
    
    <tr>
      <td scope="row" class="font2" colspan="3">
        Alamat Pengiriman<br>
                <span class="font3">     
              <span style="font-weight: bold;"> {{$p->user->nama_depan}} {{$p->user->nama_belakang}}</span>
                      <br>
                   
                      {{$p->alamat}}, {{$p->nama_kota}}, 
                     {{$p->nama_prov}},
                     {{$p->kode_pos}}</span>
    </td>
      

    </tr>
    <tr>
      <td scope="row" colspan="2" class="font3">Pembayaran<br>
      <span style="color: #858585">
       Total
      </span>
      </td>
      <td style="font-weight: bold; color:#858585;" class="font3"><br>@currency($p->total_harga)</td>
      
    </tr>
  </tbody>
</table>
        
      </div>
      
    </div>
  </div>
</div>
@endforeach


            </div> 
            </div>
                </div>
            </div>
        </div>
    </div>
</div>



   



 @foreach ($tempaan as $p) 
    {{-- Modal Tempaan --}}
<div class="modal fade" id="tempaan{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="Tempaan" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Tempaan">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <td scope="col" style="border:none;"> <span style="color: #858585;">No Pesanan</span><br> 
       #{{$p->id}}
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;"> Tanggal Pesanan</span><br>{{$p->created_at->format('d M Y  H:i')}} 
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;">Metode Pembayaran</span><br> 
        @if(!empty($p->transfer_bank))
        Transfer Bank {{$p->transfer_bank}}
        @elseif(empty($p->transfer_bank))
        _ _
        @endif  
        
      </td>
     
    </tr>
  </thead>
  <tbody>
@if (!empty($p->produk->id))
  

    <tr>
      <td style="border:none;">Produk Yang Ditempa</td>
      
    </tr>
    <tr>
      <th scope="row">
       
            <img src="{{url('images/'.$p->produk->gambar)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px; height:60px;">
            
            
      </th>
      <td style="color: #858585"> 
        {{$p->produk->nama_produk}}<br><span style="font-size: 12px;">@currency($p->produk->harga)</span>
      </td>
      <td>
        <span style="font-size: 12px; color: #858585;">Harga Produk Yang ditempa</span>
        <br> <span class="text-prim">@currency($p->produk->harga)</span>
      </td>
 
    </tr>
    @endif
    
    <tr>
      <td style="border:none;">Request Tempaan</td>
      
    </tr>
    <tr>
      <th scope="row">
       
            <img src="{{url('tempaan/'.$p->gambar1)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px; height:60px;">
            @if (!empty($p->gambar2))
            <img src="{{url('tempaan/'.$p->gambar2)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px; height:60px;">
            @endif
            @if (!empty($p->gambar3))
            <img src="{{url('tempaan/'.$p->gambar3)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px; height:60px;">
            @endif
            
            
      </th>
      <td style="color: #858585"> 
        {{$p->nama_tempaan}}<br><span style="font-size: 12px;">@currency($p->biaya)<br>{{$p->jumlah}}</span>
      </td>
      <td>
        <span style="font-size: 12px; color: #858585;">Total Harga</span>
        <br> <span class="text-prim">@currency($p->biaya*$p->jumlah)</span>
      </td>
 
    </tr>
    <tr>
      <td scope="row" class="font2" colspan="3">
        Alamat Pengiriman<br>
                <span class="font3">     
              <span style="font-weight: bold;"> {{$p->nama_penerima}}</span>
                      <br>
                   
                      {{$p->alamat}}<br>
                     {{$p->kode_pos}}</span>
    </td>
      

    </tr>
    <tr>
      <td scope="row" colspan="2" class="font3">Pembayaran<br>
      <span style="color: #858585">
       Total
      </span>
      </td>
      <td style="font-weight: bold; color:#858585;" class="font3"><br>@currency($p->biaya*$p->jumlah)</td>
      
    </tr>
  </tbody>
</table>
        
      </div>
      
    </div>
  </div>
</div>
@endforeach
{{-- Reparasi --}}


 @foreach ($reparasi as $p) 
    {{-- Modal Reparasi --}}
<div class="modal fade" id="reparasi{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="Tempaan" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Tempaan">Detail Reparasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
  <thead>
    <tr>
      <td scope="col" style="border:none;"> <span style="color: #858585;">No Pesanan</span><br> 
       #{{$p->id}}
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;"> Tanggal Pesanan</span><br>{{$p->created_at->format('d M Y  H:i')}} 
      </td>
      <td scope="col" style="border:none;">
        <span style="color: #858585;">Metode Pembayaran</span><br> 
        @if(!empty($p->transfer_bank))
        Transfer Bank {{$p->transfer_bank}}
        @elseif(empty($p->transfer_bank)) 
         _ _
         @endif
        
      </td>
     
    </tr>
  </thead>
  <tbody>

    
    <tr>
      <td style="border:none;">Reparasi</td>
      
    </tr>
    <tr>
      <th scope="row">
       
            <img src="{{url('reparasi/'.$p->gambar1)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px; height:60px;">
            @if (!empty($p->gambar2))
            <img src="{{url('reparasi/'.$p->gambar2)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px; height:60px;">
            @endif
            @if (!empty($p->gambar3))
            <img src="{{url('reparasi/'.$p->gambar3)}}" alt="produk" class="card-img-top img-fluid" style="width: 80px; height:60px;">
            @endif
            
            
      </th>
      <td style="color: #858585"> 
        <span style="font-size: 12px;">{{$p->jenis_kerusakan}}</span>
      </td>
      
      <td style="color: #858585"> 
        <span style="font-size: 12px;">@currency($p->biaya)</span>
      </td>
      <td>
        <span style="font-size: 12px; color: #858585;">Total Harga</span>
        <br> <span class="text-prim">@currency($p->biaya)</span>
      </td>
 
    </tr>
    <tr>
      <td scope="row" class="font2" colspan="3">
        Alamat Pengiriman<br>
                <span class="font3">     
              <span style="font-weight: bold;"> {{$p->nama}}</span>
                      <br>
                   
                      {{$p->alamat}}<br>
                     {{$p->kode_pos}}</span>
    </td>
      <td></td>

    </tr>
    <tr>
      <td scope="row" colspan="2" class="font3">Pembayaran<br>
      <span style="color: #858585">
       Total
      </span>
      </td>
      <td style="font-weight: bold; color:#858585;" class="font3"><br>@currency($p->biaya)</td>
      <td></td>
    </tr>
  </tbody>
</table>
        
      </div>
      
    </div>
  </div>
</div>
@endforeach
 @endif

@endsection
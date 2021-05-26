<?php
   if(Auth::check()){
    
    $d = \App\PemesananProduk::where(['produk_id' => $produk->id, 'user_id' => Auth()->user()->id])->latest()->first();
     $wishlist = \App\Wishlist::where(['produk_id' => $produk->id,'user_id' => Auth::user()->id])->first();

    
    if(!empty($d)){
        $d1= $d->pemesanan;
      
   }
     $komen = \App\Komentar::where(['produk_id' => $produk->id, 'user_id' => Auth()->user()->id])->count();
      $user_id = Auth::user()->id;
}
   
   
   
    $komen1 = \App\Komentar::where(['produk_id' => $produk->id])->count();
   
?>

@extends('dashboard.main')
@section('head')
 
       <meta name="csrf-token" content="{{ csrf_token() }}" />

@section('main')
 
<div class="container-fluid detail">
        <div class="row">

            <div class="col-12 col-md-12 mt-4">
                    <div class="card shadow">
                        <div class="row">
                        <div class="col-12 col-md-4">
                        <img src="/images/{{$produk->gambar}}" class="card-img-top img-fluid">
                      <div class="text-right container wishlist" style="font-size: 20px;">
                        <input type="hidden" name="produk_id" value="{{$produk->id}}">
                    @if (Auth::check())
                        
                    <input type="hidden" name="user_id" value="{{$user_id}}">

                      @if (!@empty($wishlist))
                    <a href="{{url('wishlist/'.$wishlist->id.'/delete')}}"><i class="fas fa-heart list"></i></a>
                         
                    @else
                    <a class="text-center btn-submit"><i class="fas fa-heart"></i></a>
                    
                    @endif    
                    @elseif (!Auth::check())
                        
                     <a href="{{url('/login')}}"><i class="fas fa-heart"></i></a>
                    @endif
                    
                      
                      
                    </div>
                        </div>
                          <div class="col-12 col-md-8">
                              <div class="inform">   
                                
                            <h5><strong>{{$produk->nama_produk}}</strong></h5>
                             <hr/>
                            <h4 style="color:#CAA563 "><strong>@currency($produk->harga)</strong></h4>
                         
                             
                            <hr />
                                <form action="/add-cart/{{$produk->id}}" method="post">
                                    @csrf
                             <input type="number" min="1" max="{{$produk->qty}}" value="1" style="border-color: #CAA563" name="qty">
                             {{-- mungkin akan manambahkan staus produk --}}
                              <hr />
                              <p>Status: @if($produk->qty <= 0)
                               <span class="text-danger"> <b>Out Stock</b></span>
                                @else
                               <span class="text-success"> <b>In Stock</b></span>
                              @endif <br><br>
                              kategori: <span style="color:#CAA563"><b>{{$produk->kategori->nama_kategori}}</b></span>
                            </p><br>

                              <button href="" class="btn btn-primary button
                              @if($produk->qty <= 0)
                              disabled
                              @endif
                              " style="background-color: white; border-color:#CAA563; color:#CAA563">Masukkan ke Keranjang</button>
                              <a  class="btn btn-primary button cursor" style="background-color: #CAA563; border-color:#CAA563; color:#FFFF;" data-toggle="modal" data-target="#exampleModal">Request Tempaan</a>
                              </form>
                            
                        </div>
                        </div>
                        </div>
                        <div class="card-body text-center">
                            
                            {{-- <h6 class="card-title" style="color:#CAA563;">{{$produk->nama_produk}}</h6>
                            <h6 class="card-text">@currency($produk->harga)</h6> --}}
                           
                        </div>
                    </div>
                </div>
            

            <div class="col-12 col-md-12 mt-4">
                   <div class="card shadow">
                      
                         <div class="col-12 col-md-12">
                             
                                
                                <div class="card-body">
                                    <h5>Deskripsi</h5>
                                <hr>
                                    {!!$produk->deskripsi!!}
                                   
                                 
                                  
                                </div>
                                
                       
                       </div>
                    
                      
                   </div>
               </div>

               
            <div class="col-12 col-md-12 mt-4">
                <div class="card shadow">
                   
                      <div class="col-12 col-md-12">
                          
                             
                             <div class="card-body">
                                 <h5>Ulasan({{$komen1}})</h5>
                             <hr>
                              @if(Auth::check())
                             @if($komen != 1)
                             @if(!empty($d) && $d1->status_pemesanan == "Dikirim")
                                 
                            
                             <div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                <form action="/komentar/{{$produk->id}}/create" method="POST"  enctype="multipart/form-data">
                                    @csrf

                                    <textarea name="komentar" class="form-control  col-8" id="komentar" rows="6"  placeholder="Tulis komentar Anda..."></textarea>
                                @if($errors->has('komentar'))
                                    <span class="help-block">{{$errors->first('komentar')}}</span>
                                @endif
                              </div>
                              <button type="submit"  class="btn btn-primary"  style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;">Kirim</button>
                               </form>
                              @endif
                                @endif
                                 @endif
                                <br><br>
                                 <div class="text-justify">
                                    @foreach ($komentar as $k)
                               <p>         <b>{{$k->user->nama_depan}} {{$k->user->nama_belakang}}</b><br><br>
                                        {{$k->komentar}}<br><br>
                                       <span style="color: #b4a7a7;"> {{$k->created_at}}</span>
                                    
                               </p>
                                <hr/>       
                               @endforeach     
                                                            
                             </div>

                             </div>
                             
                        </div>
                 
                   
                </div>
            </div>
       </div> 
     </div>
@endsection
@section('foot')
 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){

        e.preventDefault();

        
        var produk = $("input[name=produk_id]").val();
        var user = $("input[name=user_id]").val();
        
        $.ajax({
           url:"/create/wishlist",
           method:'post',
           data:{
                  Code:produk, 
                  Chief:user
                },
           success:function(response){
              if(response.success){
                 window.location.reload()
                toastr.success("Berhasil dimasukkan ke Wishlist") 
              }else{
                    toastr.error("Error") 
            
              }
           },
           error:function(error){
              console.log(error)
           }
        });
	});

</script>
@endsection
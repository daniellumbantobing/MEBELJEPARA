<?php
$kat = \App\Kategori::whereIn('nama_kategori', ['Kursi','Meja','Lemari','Pintu'])->orderby('created_at','asc')->get();

?>
@extends('dashboard.main')
@section('main')
        
    <div class="site-slider">
        @if (Auth::check())
            
        
        @if (empty( Auth::user()->no_hp) || empty( Auth::user()->nama_prov) || empty( Auth::user()->nama_kota) || empty( Auth::user()->alamat) || empty( Auth::user()->kode_pos))
            
        <div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <i class="fa fa-warning"></i> <a href="/profil" style="text-decoration: none; color:#856404;">Klik Untuk Melengkapi profil Anda</a></div>
        @endif
        @endif
    <div class="slider-one">
                    <div>
                        <img src="{{asset('user/assets/phillip-goldsberry-fZuleEfeA1Q-unsplash.jpg')}}" class="img-fluid" alt="Banner 2">
                        
                    </div>
                   
                    <div>
                        <img src="{{asset('user/assets/toa-heftiba-FV3GConVSss-unsplash.jpg')}}" class="img-fluid" alt="Banner 3">
                        
                    </div>
                 </div>
                 <div class="slider-btn">
                    <span class="prev position-top"><li class="fas fa-chevron-left"></li></span>
                    <span class="next position-top right-0"><li class="fas fa-chevron-right"></li></span>
                 </div>
             </div>
           <div class="kategori" style="margin-top: 1rem;">
            <h6><strong>Kategori Produk Yang Mungkin Anda Suka</strong></h6>
            <div class="row">
                @foreach ($kat as $k)
                <div class="col-6 col-md-3 mt-2">
                    <a href="/produk/{{$k->nama_kategori}}" class="list-group-item-action">  
                    <div class="card">
                      
                      {{-- @if ($k->nama_kategori == "Kursi") --}}
                      <img src="{{asset('user/assets/pexels-eric-montanah-1350789.jpg')}}" class="card-img-top img-fluid" alt="...">
                      {{-- @elseif ($k->nama_kategori == "Meja") --}}
                          
                      {{-- @endif --}}
                      
                      
                        <div class="card-body text-center">
                            <h6 class="card-title">{{$k->nama_kategori}}</h6>
                            
                        </div>
                    </div>
                </a>
                </div>
                @endforeach      
            </div>
        </div>
             
        <div class="produk" style="margin-top: 1rem;">
            <h6><strong>Produk Baru</strong></h6>
            <div class="row" style="margin-top:-18px;">
             @foreach ($produk as $pr)
                <a href="{{url('produk/'.$pr->id.'/detail')}}">
                 <div class="col-md-4 mt-4">
                    <div class="card shadow">
                        <img src="{{url('images/'.$pr->gambar)}}" class="card-img-top img-fluid" alt="...">
                        </a>
                        <div class="card-body text-center">
                            <h6 class="card-title" style="color:#CAA563;">{{$pr->nama_produk}}</h6>
                            <h6 class="card-text">@currency($pr->harga)</h6>
                           
                        </div>
                    </div>
                </div>
             @endforeach
                   
               
         
            </div>

     

@endsection


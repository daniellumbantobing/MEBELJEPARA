<?php
$kat = \App\Kategori::whereIn('nama_kategori', ['Kursi','Meja','Lemari','Pintu'])->orderby('created_at','asc')->get();

?>
@extends('dashboard.main')
@section('main')
        
@if (Auth::check())
                        
                    
                    @if (empty( Auth::user()->no_hp) || empty( Auth::user()->nama_prov) || empty( Auth::user()->nama_kota) || empty( Auth::user()->alamat) || empty( Auth::user()->kode_pos))
                        
                    <div class="alert alert-warning alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <i class="fa fa-warning"></i> <a href="/profil" style="text-decoration: none; color:#856404;">Klik Untuk Melengkapi profil Anda</a></div>
                    @endif
                    @endif
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner carosel-img">
                <div class="carousel-item active">
                <img src="{{asset('user/assets/banner1.jpg')}}" loading="lazy" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                <img src="{{asset('user/assets/banner2.jpg')}}" loading="lazy" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                <img src="{{asset('user/assets/banner3.jpg')}}" loading="lazy" class="d-block w-100" alt="Banner 3">
                                    
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>

           <div class="kategori" style="margin-top: 1rem;">
            <h6><strong>Kategori Produk Yang Mungkin Anda Suka</strong></h6>
            <div class="row">
                @foreach ($kat as $k)
                <div class="col-6 col-md-3 mt-2">
                    <a href="/produk/{{$k->nama_kategori}}" class="list-group-item-action">  
                    <div class="card">
                      
                      @if ($k->nama_kategori == "Kursi")
                        <img src="{{asset('user/assets/ok.png')}}" loading="lazy" class="card-img-top img-fluid" alt="...">
                      @elseif ($k->nama_kategori == "Meja")
                        <img src="{{asset('user/assets/meja.png')}}" loading="lazy" class="card-img-top img-fluid" alt="...">
                      @elseif ($k->nama_kategori == "Lemari")
                        <img src="{{asset('user/assets/lemari.png')}}" loading="lazy" class="card-img-top img-fluid" alt="...">
                      @elseif ($k->nama_kategori == "Pintu")
                        <img src="{{asset('user/assets/pintu.png')}}" loading="lazy" class="card-img-top img-fluid" alt="...">
                      @endif
                      
                      
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
                 <div class="col-md-3 col-6 mt-4">
                    <div class="card shadow cards-img">
                        <img src="{{url('images/'.$pr->gambar)}}" loading="lazy" class="card-img-top img-fluid" alt="produk">
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


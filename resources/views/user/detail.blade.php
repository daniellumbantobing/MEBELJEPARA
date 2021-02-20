@extends('dashboard.main')
@section('main')
     <div class="container-fluid detail">
        <div class="row">
             <div class="col-12 col-md-12 mt-4">
                    <div class="card shadow">
                        <div class="row">
                        <div class="col-12 col-md-4">
                        <img src="/images/{{$produk->gambar}}" class="card-img-top img-fluid">
                        
                        </div>
                          <div class="col-12 col-md-8">
                              <div class="inform">   
                                  
                            <h5><strong>{{$produk->nama_produk}}</strong></h5>
                             <hr/>
{{--                              
                            <p>Harga :<span style="font-size: 30px; font-weight: bold; margin-left:20px; color:#CAA563;">@currency($produk->harga)</span></p>  --}}
                            <h4 style="color:#CAA563 "><strong>@currency($produk->harga)</strong></h4>
                             <hr />
                                <form action="/add-cart/{{$produk->id}}" method="post">
                                    @csrf
                             <input type="number" value="1" style="border-color: #CAA563" name="qty">
                             {{-- mungkin akan manambahkan sttaus produk --}}
                              <hr />
                              <button href="" class="btn btn-primary button
                              @if($produk->qty <= 0)
                              disabled
                              @endif
                              " style="background-color: white; border-color:#CAA563; color:#CAA563">Masukkan ke Keranjang</button>
                              {{-- <a href="" class="btn btn-primary button" style="background-color: #CAA563; border-color:#CAA563">Beli Sekarang</a> --}}
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
        </div>    
     </div>
@endsection
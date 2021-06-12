@extends('dashboard.main')
@section('main')
    <div class="container">
        <div class="row">
      @include('dashboard.profil')

            @if (empty($wishlist))
                <div class="col-12 col-md-8">
  <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
   <h6>Wishlist</h6>
                       <hr/>
                        <div class="text-center">
                
                <img src="{{asset('user/assets/cart.svg')}}" alt="cart" style="width: 250px; height:200px;">
                <h6>Belum ada Produk Diwishlist</h6>
                            <a href="\" class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Cari Produk</a>
                    </div>
                    </div>
  </div>

                </div>
            @else
            
            <div class="col-12 col-md-8 wishlist1">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                    
                        <h6>Wishlist</h6>
                       <hr/>
                          <div class="row" style="margin-top:-18px;">
                          @foreach ($wishlists as $pr)
                <a href="/produk/{{$pr->produk->id}}/detail">
                 
                    <div class="col-md-4 mt-4">
                    <div class="card shadow">
                       
                    <a href="{{url('wishlist/'.$pr->id.'/delete')}}"><i class="fas fa-heart list"></i></a>
                  
                    <img src="/images/{{$pr->produk->gambar}}" class="card-img-top img-fluid" alt="...">
                        </a>
                        <div class="card-body text-center">
                            <h6 class="card-title" style="color:#CAA563;">{{$pr->produk->nama_produk}}</h6>
                            <h6 class="card-text">@currency($pr->produk->harga)</h6>
                           
                        </div>
                    </div>
                </div>
             @endforeach
                </div>
                  <div class="mx-auto my-2" style="width: 130px;">
               {{ $wishlists->links() }}
      
</div>
            </div>

            @endif
                </div>
            </div>
        </div>
    </div>
@endsection
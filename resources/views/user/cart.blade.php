@extends('dashboard.main')
@section('main')
         <?php
             $session_id = Session::get('session_id');
             if(Auth::check()){
             $cart = \App\Cart::where(['user_id' => Auth::user()->id])->first();
             }else {
                 $cart = \App\Cart::where(['session_id' => $session_id])->first();
                 
             }
         ?>

<div class="container-fluid cartproduk">
        <div class="row">
@if(empty($cart))
 <div class="col-12 col-md-12 mt-4">

  
<div class="text-center">
  <img src="{{asset('user/assets/cart.png')}}" alt="cart" style="width: 250px; height:200px;">
  <h6>Belum ada Produk Dikeranjang</h6>
            <a href="\" class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Cari Produk</a>
    </div>
 </div>
  @else
 
             <div class="col-12 col-md-7 mt-4">
                    <div class="card shadow">
                        
                        
 <table class="table cart-img">
  <thead>
    <tr>
      <th scope="col">Produk</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col"></th>
     
    </tr>
  </thead>
  
  <tbody>
       <?php $total_amount =0; ?>
     @foreach($userCart as $cart)
 
    <tr>
      <td> 
        <a href="/produk/{{$cart->produk->id}}/detail" style="color: black; text-decoration: none;">
        <img src="/images/{{$cart->produk->gambar}}" class="card-img-top img-fluid">
        </a>
       {{$cart->produk->nama_produk}}  
      </td>
      <td>{{$cart->qty}}</td>
      <td>@currency($cart->harga)</td>
      <td> <a href="/cart/{{$cart->id}}/delete" style="color: #4D4D4D"><i class="fas fa-times"></i></a> </td>
    </tr>
     <?php $total_amount = $total_amount + ($cart->harga*$cart->qty); ?>
   @endforeach
  </tbody>
</table>

      
        </div>
    </div>
                <div class="col-12 col-md-5 mt-4">
                    <div class="card shadow cart-1">
                           <div class="row m-3">
                        <div class="col-12 col-md-12">
                          <div class="row">
                          <div class="col-6 col-md-6">
                            <h6>Total Belanja </h6>
                           
                          </div>  
                           <div class="col-6 col-md-6 text-right">  
                             <h6 style="color:#CAA563;">@currency($total_amount)</h6>
                           </div>
                           </div>
                        </div>
                           <div class="col-12 col-md-12 "> 
                             <div class="row">
                          <div class="col-6 col-md-6">
                            <h6>Total Pesanan </h6>
                           
                          </div>  
                           <div class="col-6 col-md-6 text-right">  
                             <h6 style="color:#CAA563;">{{$userCart->count()}}</h6>
                           </div>
                           </div>
                          </div>
                              <div class="col-12 ">
                           <a href="/pay" class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px; width: 100%;">Lanjut Pembayaran</a>
                    </div>
                   </div>
                    
        </div>
         
        </div>
    </div>
    @endif   
</div>
</div>  
@endsection
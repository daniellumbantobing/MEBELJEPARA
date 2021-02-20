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
                           <h6>Total Belanja <span style="margin-left:15.2rem; color:#CAA563;">@currency($total_amount)</span></h6>
                        </div>
                           <div class="col-12 col-md-12 "> 
                        <h6>Total Pesanan <span style="margin-left:15.8rem; color:#CAA563;">{{$userCart->count()}}</span></h6>
                           </div>
                              <div class="col-12 ">
                           <button class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px; width: 100%;">Lanjut Pembayaran</button>
                    </div>
                   </div>
                    
        </div>
         
        </div>
    </div>
    @endif   
</div>
</div>  
@endsection
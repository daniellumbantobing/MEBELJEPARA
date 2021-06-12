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
  
  
  <img src="{{asset('user/assets/cart.svg')}}" alt="cart" style="width: 250px; height:200px;">
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

     
    </tr>
  </thead>
  
  <tbody>
       <?php 
       $total_amount =0; 
         $total_item = 0;
       ?>
     @foreach($userCart as $cart)
 
    <tr>
      <td> 
        <a href="{{url('produk/'.$cart->produk->id.'/detail')}}" style="color: black; text-decoration: none;">
        <img src="{{url('images/'.$cart->produk->gambar)}}" class="card-img-top img-fluid">
        </a>
       {{$cart->produk->nama_produk}}  
      </td>
      <td>
        <form action="/update/{{$cart->id}}/cart" method="post">
          @csrf
        <div class="num-block skin-2">
          <div class="num-in">
            <span class="minus dis"></span>
            <input type="text" class="in-num" value="{{$cart->qty}}" name="qty" readonly="">
            <span class="plus"></span>
          </div>
        </div>


      </td>
      <td>@currency($cart->harga)
      <a href="/cart/{{$cart->id}}/delete" style="color: #4D4D4D; float:right;"><i class="fas fa-times"></i></a> 
     </td>
    </tr>
    <tr>
     
      <td></td>
      <td></td>
      <td><button type="submit" class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px; float:right;">Update</button></td>
      </form>
    </tr>
    
     <?php 
     $total_amount = $total_amount + ($cart->harga*$cart->qty); 
       $total_item = $total_item + $cart->qty;
     ?>
    
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
                             <h6 style="color:#CAA563;">{{ $total_item}}</h6>
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
@section('foot')
<style>
/* skin 2 */
.skin-2 .num-in {
	background: #FFFFFF;
	box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.15);
	border-radius: 25px;
	height: 40px;
	width: 110px;
  float: left;
}

.skin-2 .num-in	span {
  width: 40%;
  display: block;
  height: 40px;
  float: left;
  position: relative;
}

.skin-2 .num-in span:before, .skin-2 .num-in span:after {
  content: '';
  position: absolute;
  background-color: #667780;
  height: 2px;
  width: 10px;
  top: 50%;
  left: 50%;
  margin-top: -1px;
  margin-left: -5px;
}

.skin-2 .num-in span.plus:after {
  transform: rotate(90deg);
}

.skin-2 .num-in input {
		float: left;
		width: 20%;
		height: 40px;
		border: none;
		text-align: center;
}

/* / skin 2 */
</style>

<script>
/////////////////// product +/-
$(document).ready(function() {
  $('.num-in span').click(function () {
      var $input = $(this).parents('.num-block').find('input.in-num');
    if($(this).hasClass('minus')) {
      var count = parseFloat($input.val()) - 1;
      count = count < 1 ? 1 : count;
      if (count < 2) {
        $(this).addClass('dis');
      }
      else {
        $(this).removeClass('dis');
      }
      $input.val(count);
    }
    else {
      var count = parseFloat($input.val()) + 1
      $input.val(count);
      if (count > 1) {
        $(this).parents('.num-block').find(('.minus')).removeClass('dis');
      }
    }
    
    $input.change();
    return false;
  });
  
});
// product +/-

</script>
@endsection
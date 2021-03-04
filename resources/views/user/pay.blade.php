@extends('dashboard.main')
@section('main')
<div class="container-fluid pay">

    <div class="row">
        <div class="col-12 col-md-7 mt-2">
<h5>Pembayaran</h5>
                <div class="card shadow">
               <div class="m-3">
                <h6>Informasi Penerima</h6>
                <p>{{$user->nama_depan}} {{$user->nama_belakang}}
                <br>{{$user->no_hp}}
                <br>{{$user->alamat}} ,{{$user->nama_kota}}, {{$user->nama_prov}}
                <br>{{$user->kode_pos}}  <a href="/editalamat" style="margin-left:20px; text-decoration:none; color:#A1A1A1;">Edit</a></p>
                <hr/>
                  <?php $total_amount =0; 
                  $total_item = 0;
                  ?>
                @foreach ($cart as $c)
                <div class="row mt-2">
                <div class="col-3">
                <img src="/images/{{$c->produk->gambar}}" alt="produk" class="card-img-top img-fluid">
                </div>
                <div class="col-9">
                <p>
                    {{$c->produk->nama_produk}}<br>
                    @currency($c->produk->harga* $c->qty)<br>
                    {{$c->qty}} item<br>
                </p>
                </div>
                </div>
                <?php 
                    $total_amount = $total_amount + ($c->harga*$c->qty); 
                    $total_item = $total_item + $c->qty;
                ?>
                @endforeach
                <hr/>
                <form action="/checkout" method="POST">
                    @csrf
                    <input type="hidden" name="total_harga" value="{{$total_amount}}">
                   <h6>Metode Pembayaran(Transfer Bank)</h6>
                <div class="row">
                    <div class="col-6">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios1" value="BNI" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <p> <img src="{{asset('user/assets/bni.jpg')}}" alt="BNI" class="card-img-top img-fluid" style="width:40px; height:30px;  border: 1px solid #A1A1A1;"> 
                    Transfer Bank BNI</p>
                </label>
                </div>
                
                    </div>
                    <div class="col-6">
               <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios2" value="BRI">
                <label class="form-check-label" for="exampleRadios2">
                  <p> <img src="{{asset('user/assets/bri.jpg')}}" alt="BRI" class="card-img-top img-fluid" style="width:40px; height:30px;  border: 1px solid #A1A1A1;"> 
                    Transfer Bank BRI</p>
                </label>
                </div>
                    </div>
                </div>
        </div> 
        </div>
    </div>
     <div class="col-12 col-md-5" style="margin-top: 2.5rem;">
     <div class="card shadow">
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
                             <h6 style="color:#CAA563;">{{$total_item}}</h6>
                           </div>
                           </div>
                          </div>
                              <div class="col-12 ">
                           <button href="/checkout" class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px; width: 100%;">Lanjut Pembayaran</button>
                    </div>
                </form>
                   </div>
     </div>
    </div>
</div>
@endsection
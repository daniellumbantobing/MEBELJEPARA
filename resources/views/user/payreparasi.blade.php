@extends('dashboard.main')
@section('main')
<div class="container-fluid pay">

    <div class="row">
        <div class="col-12 col-md-7 mt-2">
<h5>Pembayaran</h5>
                <div class="card shadow">
               <div class="m-3">
                 
                <h6>Informasi Pelanggan</h6>
                <p>{{$tempaan->nama}}
                <br>{{$tempaan->no_hp}}
                <br>{{$tempaan->alamat}} 
                <br>{{$tempaan->kode_pos}}  
              
               
                <hr/>
                  <?php $total_amount =0; 
                  $total_item = 0;
                  ?>
                <div class="row mt-2">
                <div class="col-3">
                <img src="/reparasi/{{$tempaan->gambar1}}" alt="produk" loading="lazy" class="card-img-top img-fluid">
                </div>
                <div class="col-9">
                <p>
                    {{$tempaan->jenis_kerusakan}}<br>
                    @currency($tempaan->biaya)<br>
                   
                </p>
                </div>
                </div>
               
                <hr/>
                <form action="/checkoutreparasi/{{$tempaan->id}}" method="POST">
                    @csrf
                   <h6>Metode Pembayaran(Transfer Bank)</h6>
                <div class="row">
                    <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios1" value="BNI" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <p> <img src="{{asset('user/assets/bni.jpg')}}" loading="lazy" alt="BNI" class="card-img-top img-fluid" style="width:40px; height:30px;  border: 1px solid #A1A1A1;"> 
                    Transfer Bank BNI</p>
                </label>
                </div>
                
                    </div>
                    <div class="col-4">
               <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios2" value="BRI">
                <label class="form-check-label" for="exampleRadios2">
                  <p> <img src="{{asset('user/assets/bri.jpg')}}" loading="lazy" alt="BRI" class="card-img-top img-fluid" style="width:40px; height:30px;  border: 1px solid #A1A1A1;"> 
                    Transfer Bank BRI</p>
                </label>
                </div>
                    </div>

                     <div class="col-4">
               <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios3" value="mandiri">
                <label class="form-check-label" for="exampleRadios3">
                  <p> <img src="{{asset('user/assets/mandiri.png')}}" loading="lazy" alt="mandiri" class="card-img-top img-fluid" style="width:50px; height:30px;  border: 1px solid #A1A1A1;"> 
                    Bank Mandiri</p>
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
                            <h6>Total Pembayaran </h6>
                           
                          </div>  
                           <div class="col-6 col-md-6 text-right">  
                             <h6 style="color:#CAA563;">@currency($tempaan->biaya)</h6>
                           </div>
                           </div>
                        </div>
                           <div class="col-12 col-md-12 "> 
                             <div class="row">
                        
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
</div>


@endsection
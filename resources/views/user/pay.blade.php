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
                <br>{{$user->kode_pos}}  
                <a data-toggle="modal" data-target="#exampleModalCenter" class="float-right col-md-6 cursor" style="text-decoration:none; color:#A1A1A1;"><span class="badges">Edit</span></a></p>
           
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
                    
                  <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios1" value="BNI" checked>
                <label class="form-check-label" for="exampleRadios1">
                    <p> <img src="{{asset('user/assets/bni.jpg')}}" alt="BNI" class="card-img-top img-fluid" style="width:40px; height:30px;  border: 1px solid #A1A1A1;"> 
                     Bank BNI</p>
                </label>
                </div>
                
                    </div>
                    <div class="col-4">
               <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios2" value="BRI">
                <label class="form-check-label" for="exampleRadios2">
                  <p> <img src="{{asset('user/assets/bri.jpg')}}" alt="BRI" class="card-img-top img-fluid" style="width:40px; height:30px;  border: 1px solid #A1A1A1;"> 
                    Bank BRI</p>
                </label>
                </div>
                    </div>


                      <div class="col-4">
               <div class="form-check">
                <input class="form-check-input" type="radio" name="transfer_bank" id="exampleRadios2" value="mandiri">
                <label class="form-check-label" for="exampleRadios2">
                  <p> <img src="{{asset('user/assets/mandiri.PNG')}}" alt="mandiri" class="card-img-top img-fluid" style="width:40px; height:30px;  border: 1px solid #A1A1A1;"> 
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


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Informasi Penerima</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
              <div class="modal-body">
      <form action="/update/{{$user->id}}/profilpay" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
              <label for="exampleInputEmail1">Nama Depan</label>
                   <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$user->nama_depan}}">
                             
                @if($errors->has('nama_depan'))
                    <span class="help-block">{{$errors->first('nama_depan')}}</span>
                @endif
           </div>
           <div class="form-group{{$errors->has('nama_belakang') ? ' has-error' : ''}}">
              <label for="exampleInputEmail1">Nama Belakang</label>
                   <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$user->nama_belakang}}">
                             
                @if($errors->has('nama_belakang'))
                    <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                @endif
           </div>
           <div class="form-group{{$errors->has('no_hp') ? ' has-error' : ''}}">
              <label for="exampleInputEmail1">Nomor HP</label>
                   <input name="no_hp" type="number" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No HP" value="{{$user->no_hp}}">
                             
                @if($errors->has('no_hp'))
                    <span class="help-block">{{$errors->first('no_hp')}}</span>
                @endif
           </div>
           <div class="form-group">
                            <label for="inputPassword">Alamat</label>
                           
                            <input type="text" name="alamat" class="form-control" id="inputPassword" value="{{$user->alamat}}">
                            @if($errors->has('alamat'))
                            <span class="help-block">{{$errors->first('alamat')}}</span>
                            @endif    
                      
                            
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Nama Kota</label>
                           
                            <input type="text" name="nama_kota" class="form-control" id="inputPassword" value="{{$user->nama_kota}}">
                            @if($errors->has('nama_kota'))
                            <span class="help-block">{{$errors->first('nama_kota')}}</span>
                            @endif    
                      
                            
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Nama Provinsi</label>
                           
                            <input type="text" name="nama_prov" class="form-control" id="inputPassword" value="{{$user->nama_prov}}">
                            @if($errors->has('nama_prov'))
                            <span class="help-block">{{$errors->first('nama_prov')}}</span>
                            @endif    
                     
                            
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Kode Pos</label>
                           
                            <input type="number" name="kode_pos" class="form-control" id="inputPassword" value="{{$user->kode_pos}}">
                            @if($errors->has('kode_pos'))
                            <span class="help-block">{{$errors->first('kode_pos')}}</span>
                            @endif    
                        </div>
      
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
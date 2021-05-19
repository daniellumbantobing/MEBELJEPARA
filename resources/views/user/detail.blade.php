<?php
   if(Auth::check()){
        
    $d = \App\PemesananProduk::where(['produk_id' => $produk->id, 'user_id' => Auth()->user()->id])->latest()->first();
    
   if(!empty($d)){
        $d1= $d->pemesanan;
      
   }
     $komen = \App\Komentar::where(['produk_id' => $produk->id, 'user_id' => Auth()->user()->id])->count();
  
}
   
   
   
    $komen1 = \App\Komentar::where(['produk_id' => $produk->id])->count();
  
?>

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
                            <h4 style="color:#CAA563 "><strong>@currency($produk->harga)</strong></h4>
                         
                             
                            <hr />
                                <form action="/add-cart/{{$produk->id}}" method="post">
                                    @csrf
                             <input type="number" min="1" max="{{$produk->qty}}" value="1" style="border-color: #CAA563" name="qty">
                             {{-- mungkin akan manambahkan staus produk --}}
                              <hr />
                              <p>Status: @if($produk->qty <= 0)
                               <span class="text-danger"> <b>Out Stock</b></span>
                                @else
                               <span class="text-success"> <b>In Stock</b></span>
                              @endif <br><br>
                              kategori: <span style="color:#CAA563"><b>{{$produk->kategori->nama_kategori}}</b></span>
                            </p><br>

                              <button href="" class="btn btn-primary button
                              @if($produk->qty <= 0)
                              disabled
                              @endif
                              " style="background-color: white; border-color:#CAA563; color:#CAA563">Masukkan ke Keranjang</button>
                              <a  class="btn btn-primary button cursor" style="background-color: #CAA563; border-color:#CAA563; color:#FFFF;" data-toggle="modal" data-target="#exampleModal">Request Tempaan</a>
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
            

            <div class="col-12 col-md-12 mt-4">
                   <div class="card shadow">
                      
                         <div class="col-12 col-md-12">
                             
                                
                                <div class="card-body">
                                    <h5>Deskripsi</h5>
                                <hr>
                                    {!!$produk->deskripsi!!}
                                   
                                 
                                  
                                </div>
                                
                       
                       </div>
                    
                      
                   </div>
               </div>

               
            <div class="col-12 col-md-12 mt-4">
                <div class="card shadow">
                   
                      <div class="col-12 col-md-12">
                          
                             
                             <div class="card-body">
                                 <h5>Ulasan({{$komen1}})</h5>
                             <hr>
                              @if(Auth::check())
                             @if($komen != 1)
                             @if(!empty($d) && $d1->status_pemesanan == "Dikirim")
                                 
                            
                             <div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                <form action="/komentar/{{$produk->id}}/create" method="POST"  enctype="multipart/form-data">
                                    @csrf

                                    <textarea name="komentar" class="form-control  col-8" id="komentar" rows="6"  placeholder="Tulis komentar Anda..."></textarea>
                                @if($errors->has('komentar'))
                                    <span class="help-block">{{$errors->first('komentar')}}</span>
                                @endif
                              </div>
                              <button type="submit"  class="btn btn-primary"  style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;">Kirim</button>
                               </form>
                              @endif
                                @endif
                                 @endif
                                <br><br>
                                 <div class="text-justify">
                                    @foreach ($komentar as $k)
                               <p>         <b>{{$k->user->nama_depan}} {{$k->user->nama_belakang}}</b><br><br>
                                        {{$k->komentar}}<br><br>
                                       <span style="color: #b4a7a7;"> {{$k->created_at}}</span>
                                    
                               </p>
                                <hr/>       
                               @endforeach     
                                                            
                             </div>

                             </div>
                             
                        </div>
                 
                   
                </div>
            </div>
       </div> 
     </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request Tempaan {{$produk->nama_produk}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="/create/tempaan" method="POST"  enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" value="{{$produk->id}}" name="produk_id">
                <div class="form-group {{$errors->has('nama_tempaan') ? ' has-error' : ''}}">
                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Design/Tempaan" name="nama_tempaan" value="{{old('nama_tempaan')}}">
                        @if($errors->has('nama_tempaan'))
                            <center>           <span class="help-block">{{$errors->first('nama_tempaan')}}</span></center>
                        @endif
                </div>
            
                <div class="form-group">
                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Penerima" name="nama_penerima">
                        @if($errors->has('nama_penerima'))
                                <center>           <span class="help-block">{{$errors->first('nama_penerima')}}</span></center>
                        @endif
                </div>
            
            
                <div class="form-group">
                    <textarea class="form-control rad" id="validationTextarea" placeholder="Alamat Lengkap" name="alamat"></textarea>
                    {{-- <div class="invalid-feedback">
                    Please enter a message in the textarea.
                    </div> --}}

                        @if($errors->has('alamat'))
                            <center><span class="help-block">{{$errors->first('alamat')}}</span></center>
                        @endif
                </div>

                <div class="form-group">
                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode Pos" name="kode_pos">
                        @if($errors->has('kode_pos'))
                            <center>           <span class="help-block">{{$errors->first('kode_pos')}}</span></center>
                        @endif
                </div>

            <div class="form-group">
                <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Hp" name="no_hp">
                    @if($errors->has('no_hp'))
                        <center>           <span class="help-block">{{$errors->first('no_hp')}}</span></center>
                    @endif
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Gambar 1</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar1">
                    @if($errors->has('gambar1'))
                            <center>           <span class="help-block">{{$errors->first('gambar1')}}</span></center>
                        @endif
                </div>
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Gambar 2(optional)</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar2">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Gambar 3(optional)</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar3">
            </div>


                <div class="form-group">
                    <input type="number" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah" name="jumlah">
                        @if($errors->has('jumlah'))
                                <center>           <span class="help-block">{{$errors->first('jumlah')}}</span></center>
                        @endif
                </div>
            
            <div class="form-group">
                    <textarea class="form-control rad" id="validationTextarea" placeholder="Keterangan Tempaan" name="keterangan"></textarea>
                    {{-- <div class="invalid-feedback">
                    Please enter a message in the textarea.
                    </div> --}}
                    @if($errors->has('keterangan'))
                        <center><span class="help-block">{{$errors->first('keterangan')}}</span></center>
                    @endif
                </div>
            
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Request</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
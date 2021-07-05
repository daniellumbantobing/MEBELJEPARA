@extends('dashboard.main')
@section('main')
<div class="container-fluid konfirm">
    <div class="col-12 col-md-6" style="margin: 0 auto;">
        <div class="card shadow mt-4">
            <div class="card-body">
                 <div class="text-center">
                    <h5>Review Request Reparasi</h5>
                </div>
                <br>
                    <div class="card-body">
                            <form action="/reparasi/{{$reparasi->id}}/update" method="POST"  enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Penerima" name="nama" value="{{$reparasi->nama}}">
                                        @if($errors->has('nama'))
                                                <center>           <span class="help-block">{{$errors->first('nama')}}</span></center>
                                        @endif
                                </div>
                            
                            
                                <div class="form-group">
                                    <textarea class="form-control rad" id="validationTextarea" placeholder="Alamat Lengkap" name="alamat">{{$reparasi->alamat}}</textarea>
                                    {{-- <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                    </div> --}}

                                        @if($errors->has('alamat'))
                                            <center><span class="help-block">{{$errors->first('alamat')}}</span></center>
                                        @endif
                                </div>
                
                                <div class="form-group">
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode Pos" name="kode_pos" value="{{$reparasi->kode_pos}}">
                                        @if($errors->has('kode_pos'))
                                            <center>           <span class="help-block">{{$errors->first('kode_pos')}}</span></center>
                                        @endif
                                </div>
                
                            <div class="form-group">
                                <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Hp" name="no_hp" value="{{$reparasi->no_hp}}">
                                    @if($errors->has('no_hp'))
                                        <center>           <span class="help-block">{{$errors->first('no_hp')}}</span></center>
                                    @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar 1</label><br>
                                   <img src="/reparasi/{{$reparasi->gambar1}}" loading="lazy" class="card-img-top img-fluid" style="width: 150px;">
                                    
                                <input type="file" class="form-control-file mt-1" id="exampleFormControlFile1" name="gambar1">
                                    @if($errors->has('gambar1'))
                                            <center>           <span class="help-block">{{$errors->first('gambar1')}}</span></center>
                                        @endif
                                </div>
                            
                            <div class="form-group">
                                 <label for="exampleFormControlFile1">Gambar 2(optional)</label><br>
                              @if (!empty($reparasi->gambar2))
                              <img src="/reparasi/{{$reparasi->gambar2}}" loading="lazy" class="card-img-top img-fluid" style="width: 150px;">
                              
                              @endif
                              
                                   <input type="file" class="form-control-file mt-1" id="exampleFormControlFile1" name="gambar2">
                            </div>

                            <div class="form-group">
                                 <label for="exampleFormControlFile1">Gambar 3(optional)</label><br>
                                  @if (!empty($reparasi->gambar3)) 
                                 <img src="/reparasi/{{$reparasi->gambar3}}" loading="lazy" class="card-img-top img-fluid" style="width: 150px;">
                                    @endif
                                 <input type="file" class="form-control-file mt-1" id="exampleFormControlFile1" name="gambar3">
                            </div>

                             <div class="form-group {{$errors->has('jenis_kerusakan') ? ' has-error' : ''}}">
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Design/Tempaan" name="jenis_kerusakan" value="{{$reparasi->jenis_kerusakan}}">
                                        @if($errors->has('jenis_kerusakan'))
                                            <center>           <span class="help-block">{{$errors->first('jenis_kerusakan')}}</span></center>
                                        @endif
                                </div>
                            
                            <div class="form-group">
                                    <textarea class="form-control rad" id="validationTextarea" placeholder="Keterangan Tempaan" name="keterangan">{{$reparasi->keterangan}}</textarea>
                                    {{-- <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                    </div> --}}
                                    @if($errors->has('keterangan'))
                                        <center><span class="help-block">{{$errors->first('keterangan')}}</span></center>
                                    @endif
                                </div>
                            
                            <button class="btn btn-primary col-md-5" style="float:left; border-radius:10px; background-color:#ffff; border-color:#CAA563; color:#CAA563;">Update</button>
                  
                        <a href="/pemesanan" class="btn btn-primary col-md-5" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px; float:right;">Cek Reparasi</a>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
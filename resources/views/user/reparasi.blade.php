@extends('dashboard.main')
@section('main')
<div class="container-fluid konfirm">
    <div class="col-12 col-md-6" style="margin: 0 auto;">
        <div class="card shadow mt-4">
            <div class="card-body">
                 <div class="text-center">
                    <h5>Reparasi Produk Mebel Jepara</h5>
                </div>
                <br>
                    <div class="card-body">
                            <form action="/create/reparasi" method="POST"  enctype="multipart/form-data">
                                @csrf
                               
                                <div class="form-group">
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" name="nama">
                                        @if($errors->has('nama'))
                                                <center>           <span class="help-block">{{$errors->first('nama')}}</span></center>
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
                             <div class="form-group {{$errors->has('jenis_kerusakan') ? ' has-error' : ''}}">
                                    
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Kerusakan" name="jenis_kerusakan">
                                        @if($errors->has('jenis_kerusakan'))
                                            <center>           <span class="help-block">{{$errors->first('jenis_kerusakan')}}</span></center>
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
                                    <textarea class="form-control rad" id="validationTextarea" placeholder="Keterangan Reparasi" name="keterangan"></textarea>
                                    {{-- <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                    </div> --}}
                                    @if($errors->has('keterangan'))
                                        <center><span class="help-block">{{$errors->first('keterangan')}}</span></center>
                                    @endif
                                </div>
                            
                            
                        <button class="btn btn-primary col-12 mt-4" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px; width: 100%;">Kirim</button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
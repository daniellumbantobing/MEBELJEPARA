@extends('dashboard.main')
@section('main')
<div class="container-fluid konfirm">
    <div class="col-12 col-md-6" style="margin: 0 auto;">
        <div class="card shadow mt-4">
            <div class="card-body">
                 <div class="text-center">
                    <h5>Tempaan Produk Mebel Jepara</h5>
                </div>
                <br>
                    <div class="card-body">
                            <form action="/create/tempaan" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group {{$errors->has('nama_tempaan') ? ' has-error' : ''}}">
                                    
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Tempaan" name="nama_tempaan" value="{{old('nama_tempaan')}}">
                                        @if($errors->has('nama_tempaan'))
                                            <center>           <span class="help-block">{{$errors->first('nama_tempaan')}}</span></center>
                                        @endif
                                        <span class="text">contoh: Meja Belajar</span>
                                </div>
                            
                                <div class="form-group">
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Penerima" name="nama_penerima" value="{{old('nama_penerima')}}">
                                        @if($errors->has('nama_penerima'))
                                                <center>           <span class="help-block">{{$errors->first('nama_penerima')}}</span></center>
                                        @endif
                                </div>
                            
                            
                                <div class="form-group">
                                    <textarea class="form-control rad" id="validationTextarea" placeholder="Alamat Lengkap" name="alamat">{{old('nama_penerima')}}</textarea>
                                    {{-- <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                    </div> --}}

                                        @if($errors->has('alamat'))
                                            <center><span class="help-block">{{$errors->first('alamat')}}</span></center>
                                        @endif
                                </div>
                
                                <div class="form-group">
                                    <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode Pos" name="kode_pos" value="{{old('kode_pos')}}">
                                        @if($errors->has('kode_pos'))
                                            <center>           <span class="help-block">{{$errors->first('kode_pos')}}</span></center>
                                        @endif
                                </div>
                
                            <div class="form-group">
                                <input type="text" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Hp" name="no_hp" value="{{old('no_hp')}}">
                                    @if($errors->has('no_hp'))
                                        <center>           <span class="help-block">{{$errors->first('no_hp')}}</span></center>
                                    @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar 1</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar1" value="{{old('gambar1')}}">
                                    @if($errors->has('gambar1'))
                                            <center>           <span class="help-block">{{$errors->first('gambar1')}}</span></center>
                                        @endif
                                </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar 2(optional)</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar2">
                             @if($errors->has('gambar2'))
                                            <center>           <span class="help-block">{{$errors->first('gambar2')}}</span></center>
                                        @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Gambar 3(optional)</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar3">
                                 @if($errors->has('gambar3'))
                                            <center>           <span class="help-block">{{$errors->first('gambar3')}}</span></center>
                                        @endif
                            </div>


                                <div class="form-group">
                                    <input type="number"  min="1" class="form-control rad" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jumlah" name="jumlah" value="{{old('jumlah')}}">
                                        @if($errors->has('jumlah'))
                                                <center>           <span class="help-block">{{$errors->first('jumlah')}}</span></center>
                                        @endif
                                </div>
                            
                            <div class="form-group">
                                    <textarea class="form-control rad" id="validationTextarea" placeholder="Keterangan Tempaan" name="keterangan">{{old('keterangan')}}</textarea>
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
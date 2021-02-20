@extends('dashboard.main')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 profil">
                <p style="color:#A1A1A1;">Hello,<br>
               <span style="color:#CAA563;"> {{$profil->nama_depan}} {{$profil->nama_belakang}}</span></p>
                <hr/>
                    <ul>
                        <li><a href="">Profil Saya</a></li>
                        <li><a href="">Alamat</a></li>
                        <li><a href="">Pesanan</a></li>
                        <li><a href="">Whishlist</a></li>
                       
                        
                    </ul>

            </div>
            <div class="col-12 col-md-8 profil1">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                    
                       <center> <h5>Profil Saya</h5></center>
                       <hr/>
                     <form action="/update/{{$profil->id}}/profil" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Nama Depan</label>
                            <div class="col-sm-9">
                            <input type="text" name="nama_depan" class="form-control" id="inputPassword" value="{{$profil->nama_depan}}">
                                @if($errors->has('nama_depan'))
                                <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                @endif
                        </div>
                            	
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Nama Belakang</label>
                            <div class="col-sm-9">
                            <input type="text" name="nama_belakang" class="form-control" id="inputPassword" value="{{$profil->nama_belakang}}">
                            </div>
                            @if($errors->has('nama_belakang'))
                                <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                                @endif
                        </div>
                        {{-- <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword" value="{{$profil->nama_depan}}">
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="text" name="email" class="form-control" id="inputPassword" value="{{$profil->email}}">
                            </div>
                             @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                            <input type="text" name="no_hp" class="form-control" id="inputPassword" value="{{$profil->no_hp}}">
                            </div>
                              @if($errors->has('no_hp'))
                                <span class="help-block">{{$errors->first('no_hp')}}</span>
                                @endif
                        </div>
                        <button class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Simpan</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


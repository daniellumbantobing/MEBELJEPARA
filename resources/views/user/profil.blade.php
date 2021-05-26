@extends('dashboard.main')
@section('main')
    <div class="container">
        <div class="row">
           @include('dashboard.profil')
            
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
                            @if($errors->has('nama_belakang'))
                            <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                            @endif    
                        </div>
                           
                        </div>  
                        <div class="form-group row">
                               <div class="col-sm-3">
                            <label for="inputPassword">Jenis Kelamin</label>
                               </div>
                               
                               <div class="col-sm-9">   
                                         <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" 
                                        @if ($profil->jenis_kelamin == "Laki-Laki")
                                        checked
                                            
                                        @endif
                                        >
                                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                       
                                    </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan"
                                        @if ($profil->jenis_kelamin == "Perempuan")
                                        checked
                                            
                                        @endif
                                        >
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                        
                                    </div>
                                    @if($errors->has('jenis_kelamin'))
                                    <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                    @endif         
                                </div>
                              
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
                            <input type="email" name="email" class="form-control" id="inputPassword" value="{{$profil->email}}">
                            @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                            @endif    
                        </div>
                            
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Nomor HP</label>
                            <div class="col-sm-9">
                            <input type="number" name="no_hp" class="form-control" id="inputPassword" value="{{$profil->no_hp}}">
                            @if($errors->has('no_hp'))
                            <span class="help-block">{{$errors->first('no_hp')}}</span>
                            @endif    
                        </div>
                             
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                            <input type="text" name="alamat" class="form-control" id="inputPassword" value="{{$profil->alamat}}">
                            @if($errors->has('alamat'))
                            <span class="help-block">{{$errors->first('alamat')}}</span>
                            @endif    
                        </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Nama Kota</label>
                            <div class="col-sm-9">
                            <input type="text" name="nama_kota" class="form-control" id="inputPassword" value="{{$profil->nama_kota}}">
                            @if($errors->has('nama_kota'))
                            <span class="help-block">{{$errors->first('nama_kota')}}</span>
                            @endif    
                        </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Nama Provinsi</label>
                            <div class="col-sm-9">
                            <input type="text" name="nama_prov" class="form-control" id="inputPassword" value="{{$profil->nama_prov}}">
                            @if($errors->has('nama_prov'))
                            <span class="help-block">{{$errors->first('nama_prov')}}</span>
                            @endif    
                        </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Kode Pos</label>
                            <div class="col-sm-9">
                            <input type="number" name="kode_pos" class="form-control" id="inputPassword" value="{{$profil->kode_pos}}">
                            @if($errors->has('kode_pos'))
                            <span class="help-block">{{$errors->first('kode_pos')}}</span>
                            @endif    
                        </div>
                            
                        </div>
                        <button class="btn btn-primary" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Simpan</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection


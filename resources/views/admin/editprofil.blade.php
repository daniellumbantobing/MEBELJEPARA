@extends('layouts.master')
@section('title','Profil')
@section('header')


@section('content')
<div class="main">
 		<div class="main-content">
 			<div class="row">
 				<div class="col-md-12">
 				<div class="panel">
								<div class="panel-heading">
									<b><h3 class="panel-title">Profile</b></h3>
								</div>
								<div class="panel-body">
								<form action="/profil/{{$profil->id}}/update" method="POST" enctype="multipart/form-data">
								@csrf
							  <div class="form-group {{$errors->has('nama_depan') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Nama Depan</label>
							    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$profil->nama_depan}}">
                                  @if($errors->has('nama_depan'))
                                      <center>  <span class="help-block">{{$errors->first('nama_depan')}}</span></center>
                                    @endif
                            
                             </div>

                               <div class="form-group  {{$errors->has('nama_belakang') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Nama Belakang</label>
							    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$profil->nama_belakang}}">
							 @if($errors->has('nama_belakang'))
                                      <center>  <span class="help-block">{{$errors->first('nama_belakang')}}</span></center>
                                    @endif  
                            </div>

					
							 <div class="form-group {{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
							    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
							    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
							      <option value="{{$profil->jenis_kelamin}}" selected>{{$profil->jenis_kelamin}}</option>
							      
                                    <option value="Laki-Laki">Laki-laki</option>
							      <option value="Perempuan">Perempuan</option>
							    </select>
                                 @if($errors->has('jenis_kelamin'))
                                      <center>  <span class="help-block">{{$errors->first('jenis_kelamin')}}</span></center>
                                    @endif  
							 </div>

                              <div class="form-group  {{$errors->has('no_hp') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">No HP</label>
							    <input name="no_hp" type="number" min="1" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="No HP" value="{{$profil->no_hp}}">
                                @if($errors->has('no_hp'))
                                      <center>  <span class="help-block">{{$errors->first('no_hp')}}</span></center>
                                    @endif
                            </div>

							 <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Email</label>
							    <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$profil->email}}">
							 
                                 @if($errors->has('email'))
                                      <center>  <span class="help-block">{{$errors->first('email')}}</span></center>
                                    @endif
							 </div>
                                    
                                    
                                    <div class="form-group {{$errors->has('avatar') ? ' has-error' : ''}}">

                                        
                              
							    <label for="exampleFormControlTextarea1">Avatar</label>
                                <br>
                                   @if (!empty($profil->avatar))
                                  <img src="{{asset('avatar/'.$profil->avatar)}}" loading="lazy" alt="avatar" style="width: 150px; height:150px;">   
                                 @endif
							    <input type="file" name="avatar" class="form-control" value="{{$profil->avatar}}"> 
                                 @if($errors->has('avatar'))
                                      <center>  <span class="help-block">{{$errors->first('avatar')}}</span></center>
                                    @endif
							</div>
								<button type="submit" class="btn btn-primary">Update</button>
						</form>
								</div>
							</div>

 				</div>
 			</div>
 		</div>
 	</div>

     @endsection
@extends('layouts.master')
@section('title','Profil')
@section('header')


@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid col-md-6">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="card">
                               
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{asset('avatar/'.$profil->avatar)}}" class="img-circle" alt="Avatar">
										<h3 class="name">{{$profil->nama_depan}}</h3>
										
									</div>
									
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Informasi Profil</h4>
										<ul class="list-unstyled list-justify">
											<li>Nama <span>{{$profil->nama_depan}} {{$profil->nama_belakang}}</span></li>
									        <li>Jenis Kelamin <span>{{$profil->jenis_kelamin}}</span></li>
							                <li>No HP <span>{{$profil->no_hp}}</span></li>
											<li>Email <span>{{$profil->email}}</span></li>
										</ul>
									</div>
									<div class="text-center"><a href="{{url('/edit/myprofil')}}" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
						
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection


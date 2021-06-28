<html lang="en" class="fullscreen-bg">
<head>
	<title>Daftar</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	 <meta name="viewport" content="width=device-width,initial-scale=1">
	
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css 	')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
  <!-- GOOGLE FONTS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
  <link rel="icon" href="{{asset('user/assets/icon.png')}}" style="width: 100px;">
  <!-- TABLES -->
  <link rel="stylesheet" href="{{asset('user/css/register.css')}}">

</head>

<body>
	 {{-- @if(session('sukses'))
					<div class="alert alert-success" role="alert">
						{{session('sukses')}}
					</div>
				@endif   --}}
<div class="login-page">
  <div class="form">
    
	<div class="header">
		<a href="/"><img src="{{asset('user/assets/logo.png')}}" class="my-md-3" alt="logo"></a>
  
    <p class="lead" style=""><b>Daftar Akun</b></p>
	</div>
	<form action="/postregister" method="POST">
		@csrf
  	<div class="row">
	<div class="form-group col-md-6 {{$errors->has('nama_depan') ? ' has-error' : ''}}">
		<label for="signin-nama_depan" class="control-label sr-only">nama_depan</label>
		<input type="text" class="form-control" id="signin-nama_depan" placeholder="Nama Depan" name="nama_depan" value="{{old('nama_depan')}}">
		@if($errors->has('nama_depan'))
		<span class="help-block">{{$errors->first('nama_depan')}}</span>
		@endif
	</div>

	<div class="form-group col-md-6 {{$errors->has('nama_belakang') ? ' has-error' : ''}}">
		<label for="signin-email" class="control-label sr-only">nama_belakang</label>
		<input type="text" class="form-control" id="signin-email" placeholder="Nama Belakang" name="nama_belakang" value="{{old('nama_belakang')}}">
		@if($errors->has('nama_belakang'))
		<span class="help-block">{{$errors->first('nama_belakang')}}</span>
		@endif
	</div>
	  </div>
	<div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
		<label for="signin-email" class="control-label sr-only">email</label>
		<input type="email" class="form-control" id="signin-email" placeholder="Email" name="email" value="{{old('email')}}">
		@if($errors->has('email'))
		<span class="help-block">{{$errors->first('email')}}</span>
		@endif
	</div>
	<div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
		<label for="signin-email" class="control-label sr-only">password</label>
		<input type="password" class="form-control" id="signin-email" placeholder="Password" name="password" value="{{old('password')}}">
		@if($errors->has('password'))
		<span class="help-block">{{$errors->first('password')}}</span>
		@endif
	</div>
	<input  type="submit" class="btn btn-yellow  btn-md btn-block text-uppercase" value="Daftar" style="text-align: center;">
	<div class="bottom" style="padding-top:10px;">
		<span class="helper-text">Sudah Memiliki Akun? <a href="/login">Daftar</a></span>
	</div>
</form>  
</div>
</div>
					
</body>
</html>

<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
<script>
  @if(Session::has('sukses'))
    toastr.success("{{Session::get('sukses')}}", "Sukses") 
  @endif
</script>
<script>
  @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}", "Error") 
  @endif
</script>
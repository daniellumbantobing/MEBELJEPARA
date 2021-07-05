 <html lang="en" class="fullscreen-bg">
<head>
	<title>Masuk</title>
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
  <link rel="stylesheet" href="{{asset('user/css/login.css')}}">
  <!-- GOOGLE FONTS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
  <link rel="icon" href="{{asset('user/assets/icon.png')}}" style="width: 100px;">
    <!-- TABLES -->


</head>

<body>
	 {{-- @if(session('sukses'))
					<div class="alert alert-danger" role="alert">
						{{session('sukses')}}
					</div>
        @endif   --}}
        
<div class="login-page">

  
  <div class="form">
       
    <div class="header">
    <a href="/"><img src="{{asset('user/assets/logo.png')}}" loading="lazy" class="my-md-3" alt="logo"></a>
		<p class="lead" style=""><b>Masuk</b></p>
	</div>
	<form action="/postlogin" method="POST">
		@csrf
  	<div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
		<label for="signin-email" class="control-label sr-only">email</label>
		<input type="email" class="form-control" id="signin-email" placeholder="Email" name="email" value="
     @if (!empty(session()->get( 'email' )))
    {{ session()->get( 'email' ) }}
    @endif
    {{old('email')}}
    
    ">
		@if($errors->has('email'))
		<span class="help-block">{{$errors->first('email')}}</span>
		@endif
	</div>

	
  <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
    
    <div class="input-group" id="show_hide_password">
      <input type="password" class="form-control" id="pass" placeholder="Password" name="password" value="{{old('password')}}">
      <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
    </div>
    @if($errors->has('password'))
		<span class="help-block">{{$errors->first('password')}}</span>
		@endif
  </div>
	  
  <input type="submit" class="btn btn-primary  btn-md btn-block text-uppercase" style="border-radius:10px; background-color:#CAA563; border-color:#CAA563; margin-top:50px;" value="Masuk" style="text-align: center;">
	<div class="bottom" style="padding-top:10px;">
		<span class="helper-text">Belum Memiliki Akun ? <a href="/register">Daftar</a></span>
  </div>
</form>  

</div>
</div>


	</body>

 
</html>

<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
<script>
  $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>


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
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width,initial-scale=1">
	  <title>@yield('title','Mebel Jepara')</title>
    <link rel="icon" href="{{asset('user/assets/icon.png')}}" style="width: 100px;">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/56564b26bf.js" crossorigin="anonymous"></script>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    
</head>
<body>  
  
    <!-- header -->
    
    @include('dashboard.header')
    <!-- main -->
    <main>
        <!-- First Slider -->
         <div class="container-fluid p-3"> 
            @yield('main')
        </div>
    </main>
    <a href="https://api.whatsapp.com/send?phone=6281362024209&text=Hallo%21%20Stasiun Mebel Jepara" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
    <!-- footer -->
  @include('dashboard.footer')
  
<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{asset('user/js/main.js')}}"></script>

    @yield('foot')
    
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
   
          

</body>
</html>
	

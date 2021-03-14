<header class="sticky-top">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 col-4">
                    
               <a href="/"><img src="{{asset('user/assets/logo.png')}}" class="my-md-3" alt="logo" style="width: 300px;"></a>
                
                </div>
            
                <div class="col-md-4 col-4">
                {{-- serch --}}
                   
                    <form action="/cari/produk" method="GET">
                    <div class="input-group mb-3 my-md-4">
                        <div class="input-group-prepend">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #F9F9F9; border-color:#F9F9F9; border-top-left-radius:20px;border-bottom-left-radius: 20px; font-size:12px; color:#858585;">Kategori</button>
                        <div class="dropdown-menu" style="font-size: 12px;">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="cari" aria-label="Text input with dropdown button" style="background-color: #F9F9F9;border-color:#F9F9F9;">
                     <button class="btn" type="submit"  style="background-color: #F9F9F9; border-color:#F9F9F9; border-top-right-radius:20px;border-bottom-right-radius: 20px; color:#858585;"><i class="fas fa-search"></i></button>
                    
                    
                </div>
                    </form>
                </div>
                <div class="col-md-4 col-4 text-right">
                    
                    <div class="nav-item my-md-4 header-links">
                       
                        <ul style="list-style: none; ">

                        <li>
                            <?php
                                $session_id = Session::get('session_id');
                                 if(Auth::check()){   
                                  
                                     $notif = \App\Cart::where('user_id', Auth::user()->id)->count(); 
                                 }
                                 else{
                                     $notif = \App\Cart::where('session_id', $session_id)->count(); 
                                 }
                                 
                                ?>
                                <a href="{{url('/cart')}}">
                            <i class="fas fa-shopping-cart p-2">
                                @if(!empty($notif))
                                <span class="badge badge-danger">{{$notif}}</span>
                                @endif
                                
                        </i>
                                </a>
                            
                        </li>
                                
                                
                        <li><i class="fas fa-bell p-2"></i></li>
                         
                              
                            <li><i class="fas fa-user p-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        @if(!Auth::check())
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/login">Login</a>
                            <a class="dropdown-item" href="/register">Daftar</a>
                            
                        </div>
                        
                        @elseif(auth()->user()->role == 'user')
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           
                            <a class="dropdown-item" href="/logout">Logout</a>
                             <a class="dropdown-item" href="/profil">Profil</a>
                            
                        </div>
                        
                        @endif
                            </li>
                        </ul>
                    </div>  
                    
                    </div>
                    
                  
                </div>
                
            </div>
        </div>
       
    </header>
     <div class="container-fluid" style="background-color: #CAA563;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link text-white" href="/">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="#">Ruang Tamu</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="#">Ruang Makan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Custom Furniture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Reparasi</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link text-white" href="#">Ruang Makan</a>
                    </li> --}}
                  </ul>
                </div>
            
            </nav>
              
              
        </div>
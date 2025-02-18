<?php
use App\Http\Controllers\Controller;
$kategori = Controller::mainCategories();
?>
<header class="sticky-top shadow">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 head-img">
                    
               <a href="{{url('/')}}">
                <img src="{{asset('user/assets/logo.png')}}" loading="lazy" class="my-md-3" alt="logo">
                </a>
                
                </div>
            
                <div class="col-md-4 head-search">
                {{-- serch --}}
             
                   
                    <form action="{{url('/cari/produk')}}" method="GET">
                    <div class="input-group mb-3 my-md-4">
                        <div class="input-group-prepend">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #F9F9F9; border-color:#F9F9F9; border-top-left-radius:20px;border-bottom-left-radius: 20px; font-size:12px; color:#858585;">Kategori</button>
                        <div class="dropdown-menu" style="font-size: 12px;">
                      @foreach ($kategori as $kt)
                      <a class="dropdown-item" href="{{url('produk/'.$kt->nama_kategori)}}">{{$kt->nama_kategori}}</a>
                          
                      @endforeach
                      
                        </div>
                    </div>
                    <input type="text" class="form-control" name="cari" aria-label="Text input with dropdown button" style="background-color: #F9F9F9;border-color:#F9F9F9;">
                     <button class="btn" type="submit"  style="background-color: #F9F9F9; border-color:#F9F9F9; border-top-right-radius:20px;border-bottom-right-radius: 20px; color:#858585;"><i class="fas fa-search"></i></button>
                    
                    
                </div>
                    </form>
                </div>
                <div class="col-md-4 text-right">
                    
                    <div class="nav-item my-md-4 header-links head-top">
                       
                        <ul style="list-style: none;">

                        <li>
                            <?php
                                $session_id = Session::get('session_id');
                                 if(Auth::check()){   
                                  
                                     $notif = \App\Cart::where('user_id', Auth::user()->id)->count(); 
                                     $notif1= \App\Notifikasi::where('user_id', Auth::user()->id)->latest()->take(6)->get(); 
                                     $notif3= \App\Notifikasi::where(['user_id' => Auth::user()->id, 'status' => 1])->latest()->get();    
                                     
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
                                
                       @if (Auth::check())
                           
                      
                     
                        <li>
                              
                                        <i class="fas fa-bell p-2 cursor" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         @if(!empty($notif1))                    
                                            @if($notif1->count() == 0)
                                                <span class="badge badge-danger"></span>
                                            @else
                                            <span class="badge badge-danger">{{$notif3->count()}}</span>
                                        
                                            @endif
                            @endif   

                             </i>
                       @if(!empty($notif1))  
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($notif1 as $n)
                            <div class="col-md-12">
                                <div class="row">
                                     <div class="col-md-1">
                                          <a href="{{url('delete/'.$n->id.'/notif')}}"><i class="fas fa-times"></i></a> 
                                     </div>
                                     <div class="col-md-10">
                                         <a class="dropdown-item" href="{{url('/pemesanan')}}">{!! $n->isi !!}</a>
                            
                                     </div>
                                </div>
                            </div>
                            
                            
                            @endforeach
                        <hr>
                            <div class="text-center">
                             <a href="{{url('update/notifikasi')}}" ><u>Tandai Semua Telah Dibaca</u> </a>
                            </div>
                        </div>
                                     
                       @endif         
                    </li>        
                           @endif
                            <li>
                        <i class="fas fa-user-circle p-2 cursor" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                        @if(!Auth::check())
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url('/login')}}">Masuk</a>
                            <a class="dropdown-item" href="{{url('/register')}}">Daftar</a>
                            
                        </div>
                        
                        @elseif(auth()->user()->role == 'user')
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                             <a class="dropdown-item" href="{{url('/profil')}}">Profil</a>
                             <a class="dropdown-item" href="{{url('/wishlist')}}">Wishlist</a> 
                             <a class="dropdown-item" href="{{url('/logout')}}">Logout</a> 
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
                      <a class="nav-link text-white" href="{{url('/')}}">Beranda <span class="sr-only"></span></a>
                 
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/tempahan')}}">Tempaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/reparasiMebel')}}">Reparasi</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link text-white" href="#">Ruang Makan</a>
                    </li> --}}
                  </ul>
                </div>
            
            </nav>
              
              
        </div>
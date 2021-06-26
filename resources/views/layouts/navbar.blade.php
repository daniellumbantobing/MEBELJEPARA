
              <?php
                                 if(Auth::check()){   
                                  
                                     $notif1= \App\Notifikasi::where(['user_id' => Auth::user()->id])->latest()->take(6)->get(); 
                                     $notif2= \App\Notifikasi::where(['user_id' => Auth::user()->id, 'status' => 1])->latest()->get(); 
                                        
                                     
                                 }
                                
                                 
                                ?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
   <a href="/home/admin" style="font-family: Trebuchet MS, Helvetica, sans-serif; font-size:18px;font-weight:bold;">Stasiun Mebel Jepara</a> 
   
    </div>
    <div class="container-fluid">
      <div class="navbar-btn">
        <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
      </div>
      
      <div id="navbar-menu">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            

                            
            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
             
              <i class="lnr lnr-alarm"></i>
              <span class="badge bg-danger">{{$notif2->count()}}</span>
            </a>
            <ul class="dropdown-menu notifications">
              <li>
            
                                   @if(!empty($notif1)) 
                      @foreach ($notif1 as $n)
                            
                <a href="
                @if ($n->id_notif == 1)
                {{url("/pemesananproduk")}}
                  @elseif ($n->id_notif == 2)
                  {{url("/pesananreparasi")}}
                  
                  @elseif ($n->id_notif == 3)
                  {{url("/pesanantempaan")}}
                    @elseif ($n->id_notif == 4)
                  {{url("/feedback")}}
                  
                @endif
                
                " class="notification-item"><span class="dot bg-danger"></span>{!!$n->isi!!}</a>
                      @endforeach
                      @endif
              </li>
              <li><a href="{{url('/notifikasi')}}" class="more">Lihat Semua Notifikasi</a></li>
              <li><a href="{{url('update/notifikasi')}}" class="more">Tandai Semua Telah Dibaca</a></li>
            </ul>
          </li>
        
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if (!empty(auth()->user()->avatar))
              <img src="{{asset('avatar/'.auth()->user()->avatar)}}" class="img-circle" alt="Avatar">  
              @endif
              
               <span>{{auth()->user()->nama_depan}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="{{url('/myprofil')}}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
              <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
            </ul>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>
      <div class="col-12 col-md-4 profil">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                <p style="color:#A1A1A1;">
               <span style="color:#CAA563;"> {{$profil->nama_depan}} {{$profil->nama_belakang}}</span>
            <br>{{$profil->jenis_kelamin}}
            </p>
                <hr/>
                    <ul >
                        <li class="">
                            <a href="/profil" class="">Profil Saya</a>
                        </li>
                      
                        <li>
                            <a href="/pemesanan">Pesanan</a>
                        </li>
                        <li>
                            <a href="{{url('/wishlist')}}">Wishlist</a>
                        </li>
                       
                        
                    </ul>

            </div>
                </div>
            </div>
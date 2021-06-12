@extends('dashboard.main')
@section('title','Cara Pemesanan')
@section('main')

<div class="about1">
<div class="about">

         <div class="card" style="border-radius:20px; background-color:#F5F5FA;">
  <div class="card-body">
      <div class="card-body p">
        <div class="text-center">
            <p><b>Cara Pemesanan</b></p>
            </div>
          
  
    </div>
</div>
</div>

</div>
<div class="container mt-4">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active a" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Produk Biasa</a>
  </li>
  <li class="nav-item">
    <a class="nav-link a" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tempaan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link a" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Reparasi</a>
  </li>
   <li class="nav-item">
    <a class="nav-link a" id="pay-tab" data-toggle="tab" href="#pay" role="tab" aria-controls="pay" aria-selected="false">Pembayaran</a>
  </li>
</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="text-center mt-3">
        <img src="{{asset("user/assets/biasa.jpg")}}" class="rounded img-order" alt="Produk Biasa">
    </div>   
   </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="text-center mt-3">
        <img src="{{asset("user/assets/tempaan.jpg")}}" class="rounded img-order" alt="Produk Biasa">
    </div>     
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <div class="text-center mt-3">
        <img src="{{asset("user/assets/reparasi.jpg")}}" class="rounded img-order" alt="Produk Biasa">
    </div> 
  </div>
  <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="pay-tab">
    <div class="mt-3">
        
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="text-center">
                        <img src="{{asset('user/assets/bn.png')}}" class="img-fluid" style="width: 60%">
                        <div class="card-body">
                               <p class="card-text"><b>Stasiun Mebel Jepara</b><br>No. Rek: 1XXXXXX</p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="card">
                        <div class="text-center">
                          <img src="{{asset('user/assets/br.png')}}" class="img-fluid" style="width: 60%">
                        <div class="card-body">
                              <p class="card-text"><b>Stasiun Mebel Jepara</b><br>No. Rek: 1XXXXXX</p>
                            
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                         <div class="text-center">
                          <img src="{{asset('user/assets/mandiri.png')}}" class="img-fluid" style="width: 60%">
                        <div class="card-body">
                             <p class="card-text"><b>Stasiun Mebel Jepara</b><br>No. Rek: 1XXXXXX</p>
    
                        </div>
                         </div>
                    </div>
                </div>

            </div>
       
        <div class="text-justify mt-4">
    <p>
        1. Pembayaran dengan virtual account dapat dilakukan dengan cara pilih akun bank yang telah tersedia <br>
        2. Lalu klik Lanjut Pembayaran dan lihat nomor rekening virtual di detail pesanan<br>
        3. Untuk melakukan pembayaran klik Konfirmasi Pembayaran, lalu isi form Upload Bukti Pembayaran<br>
        4. Setelah itu klik tombol kirim 
    </p>
    <p>
     <span style="font-weight: bold;">Bagaimana Cara Mengetahui Posisi Kiriman Barang Pesanan Saya?</span><br>
      Kami akan menginformasikan nomor kontak atau HP supir yang membawa barang Anda sehingga dengan mudah mengetahui posisi kiriman barang Anda.
    </p>
    </div>
    </div>
  </div>
</div>
 
        
</div>

</div>
@endsection

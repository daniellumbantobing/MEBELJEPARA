<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
      <nav>
        <ul class="nav">
          <li><a href="/home/admin" class="active"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
          <li>
            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fas fa-archive"></i> <span>Produk</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="subPages" class="collapse ">
              <ul class="nav">
                <li><a href="/cretate/produk" class="">Produk</a></li>
                <li><a href="/kategori" class="">Kategori</a></li>
               </ul>
            </div>
          </li>
          
           <li>
            <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="fas fa-shopping-cart"></i> <span>Data Pemesanan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="subPages1" class="collapse">
              <ul class="nav">
                <li><a href="/pemesananproduk" class="">Produk Biasa</a></li>
                <li><a href="/pesanantempaan" class="">Tempaan</a></li>
                <li><a href="/pesananreparasi" class="">Reparasi</a></li>
               </ul>
            </div>
          </li>
          

          


          <li><a href="/userlist" class=""><i class="fas fa-user-friends"></i> <span>Data Pelanggan</span></a></li>
          
          
           <li>
            <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fas fa-file-medical-alt"></i> <span>Laporan Penjualan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
            <div id="subPages2" class="collapse">
              <ul class="nav">
                <li><a href="{{url('/laporanpenjualan')}}" class="">Produk Biasa</a></li>
                <li><a href="{{url('/laporantempaan')}}" class="">Tempaan</a></li>
                <li><a href="{{url('/laporanreparasi')}}" class="">Reparasi</a></li>
               </ul>
            </div>
          </li>
          
         
          <li>
            <a href="/feedback"><i class="fas fa-comment"></i> <span>Feedback</span></a>
           
          </li>
          <li><a href="{{url('/notifikasi')}}" class=""><i class="fas fa-bell"></i> <span>Notifikasi</span></a></li>
        </ul>
      </nav>
    </div>
  </div>
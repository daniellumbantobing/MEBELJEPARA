@extends('layouts.master')
@section('title','Pemesanan Produk Biasa')
@section('content')
   <div class="main">
        <div class="main-content">
            <!-- @if(session('sukses'))
                   <div class="alert alert-success" role="alert">
                       {{session('sukses')}}
                   </div>
               @endif  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel" style="border-radius:10px;">
                               <div class="panel-heading">
                                   <h3 class="panel-title">Produk Biasa</h3>
                                   
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
                                    <table class="table table-striped" id="table-datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Status Pembayaran</th>
                                                <th>Status Pemesanan</th>
                                                
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     @foreach ($p_biasa as $key=>$us)
                         <?php  $total_pesanan = 0;?>
                                @foreach($us->pemesananproduk as $pro) 
                        
                         <?php  $total_pesanan = $total_pesanan+$pro->qty;?>
                        @endforeach
                         
            

                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$us->user->nama_depan}} {{$us->user->nama_belakang}}</td>
                                                <td>{{$total_pesanan}}</td>
                                                <td>@currency($us->total_harga)</td>
                                                <td>{{$us->status_pembayaran}}</td>
                                                <td>{{$us->status_pemesanan}}</td>
                                                
                   
                                        <td>
                  
                                        


                                        
                                            <a target="_blank" href="/detpro/{{$us->id}}" class="btn btn-success btn-sm"  style="border-radius:10px"><i class="fas fa-eye"></i></a>
                                            @if($us->status_pemesanan == "Dikirim")
                                            <a href="/conf1/{{$us->id}}" class="btn btn-danger btn-sm"  style="border-radius:10px">Batal Kirim</a>
                                            
                                            @elseif($us->status_pemesanan == "Belum Dikirim")
                                            <a href="/conf/{{$us->id}}" class="  btn btn-primary btn-sm
                                                @if($us->status_pembayaran == "Belum Dibayar")
                                                disabled
                                                @endif
                                                "  style="border-radius:10px">Konfirmasi/Kirim</a>
                                            
                                            @elseif($us->status_pemesanan == "Batal Dikirim")
                                                <a href="/conf/{{$us->id}}" class="  btn btn-primary btn-sm
                                                @if($us->status_pembayaran == "Belum Dibayar")
                                                disabled
                                                @endif
                                                "  style="border-radius:10px">Konfirmasi/Kirim</a>
                                            

                                                @endif
                                            
                                            </td>
                    
                        </tr>
                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                   <center>   {{ $p_biasa->links() }}</center>
                                </div>
                                  
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

        


@endsection

@section('footer')

<script type="text/javascript">
  
 $('#table-datatables').DataTable( {
    "order": [],
    "paging": false
    
})
</script>
@endsection
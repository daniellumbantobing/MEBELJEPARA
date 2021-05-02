@extends('layouts.master')
@section('title','Pesanan Tempaan')
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
                                   <h3 class="panel-title">Reparasi</h3>
                                   
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
                                    <table class="table table-striped" id="table-datatables">
                                        <thead>
                                             <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                               
                                                <th>Total Harga</th>
                                                <th>Status Pembayaran</th>
                                                <th>Status Pemesanan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     @foreach ($reparasi as $key=>$p)
                         
                     
                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$p->user->nama_depan}} {{$p->user->nama_belakang}}</td>
                                              	
                                                <td>@currency($p->biaya)</td>
                                      			<td>{{$p->status_pembayaran}}</td>
                                      			<td>{{$p->status_pemesanan}}</td>
                                      			<td>
                                      	<a data-toggle="tooltip" title="Detail untuk konfirmasi biaya" target="_blank" href="/detreparasi/{{$p->id}}" class="btn btn-success btn-sm"  style="border-radius:10px">Detail</a>
                                            @if($p->status_pemesanan == "Dikirim")
                                            <a href="/konfrep1/{{$p->id}}" class="btn btn-danger btn-sm"  style="border-radius:10px">Batal Kirim</a>
                                            
                                            @elseif($p->status_pemesanan == "Belum Dikirim")
                                            <a href="/konfrep/{{$p->id}}" class="  btn btn-primary btn-sm
                                                @if($p->status_pembayaran == "Belum Dibayar")
                                                disabled
                                                @endif
                                                "style="border-radius:10px">Konfirmasi/Kirim</a>
                                            
                                            @elseif($p->status_pemesanan == "Batal Dikirim")
                                                <a href="/konfrep/{{$p->id}}" class="  btn btn-primary btn-sm
                                                @if($p->status_pembayaran == "Belum Dibayar")
                                                disabled
                                                @endif
                                                "  style="border-radius:10px">Konfirmasi/Kirim</a>
                                            

                                                @endif
                              			</td>
                                      			
        
                        </tr>
                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                </div>
                                  
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

        


@endsection


@section('footer')
<script>
	 ClassicEditor
        .create( document.querySelector( '#konten' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
$('.delete').click(function(){
		  var produk_id = $(this).attr('produk-id');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus data user dengan id " +produk_id + "??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/user/"+produk_id+"/hapus";
		  } 
		}); 
	});
</script>
<script type="text/javascript">
  
 $('#table-datatables').DataTable( {
    "order": [],
    "paging": false,
    //  'rowsGroup': [2],
    // createdRow: function(row, data, dataIndex){
    //     // If name is "Ashton Cox"
      
    //         // Add COLSPAN attribute
    //         $('th:eq(1)', row).attr('colspan', 2);

    //         // Hide required number of columns
    //         // next to the cell with COLSPAN attribute
    //         $('th:eq(2)', row).css('display', 'none');
    //         $('th:eq(3)', row).css('display', 'none');

    //         // Update cell data
    //     //     this.api().cell($('td:eq(0)', row)).data('N/A');
    //     //     this.api().cell($('td:eq(1)', row)).data('N/A');
    //     //     this.api().cell($('td:eq()', row)).data('N/A');
    //     // 
    //     }
    
})
</script>

@endsection

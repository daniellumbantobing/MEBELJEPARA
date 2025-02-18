@extends('layouts.master')
@section('title','Feedback')
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
                                   <b><h3 class="panel-title">Notifikasi</b></h3>
                                   
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
                                    <table class="table table-striped" id="table-datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Notfikasi</th>
                                                {{-- <th>No HP</th> --}}
                                                  
                                                {{-- <>Alamat</>
                                                <th>Kota</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     @foreach ($notif as $key=>$us)
                         
                     
                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                <a href="  @if ($us->id_notif == 1)
                {{url("/pemesananproduk")}}
                  @elseif ($us->id_notif == 2)
                  {{url("/pesananreparasi")}}
                  
                  @elseif ($us->id_notif == 3)
                  {{url("/pesanantempaan")}}
                    @elseif ($us->id_notif == 4)
                  {{url("/feedback")}}
                  
                @endif">    {!!$us->isi!!}
                                                </a>
                                                </td>
                                                
                                        
                                                
                                        
                                        <td>
                    <a href="#" wire:click="destroy({{$us->id}})" class="btn btn-danger btn-sm delete" style="border-radius:10px" produk-id="{{$us->id}}"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                    
        
                        </tr>


                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                </div>
                                    <center>
                        {{ $notif->links() }}
                        </center>
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
		  title: "Konfirmasi Hapus",
		  text: "Apa kamu ingin menghapus notifikasi ?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/delete/"+produk_id+"/notifikasi";
		  } 
		}); 
	});
</script>
<script type="text/javascript">
  
 $('#table-datatables').DataTable( {
    "order": [],
    "paging": false
    
})
</script>

@endsection

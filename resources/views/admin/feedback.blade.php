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
                                   <h3 class="panel-title">Feedback</h3>
                                   
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
                                    <table class="table table-striped" id="table-datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>No HP</th> --}}
                                                <th>Produk</th>
                                                  
                                                {{-- <>Alamat</>
                                                <th>Kota</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     @foreach ($komen as $key=>$us)
                         
                     
                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$us->user->nama_depan}} {{$us->user->nama_belakang}}</td>
                                                <td>{{$us->produk->nama_produk}}</td>
                                                
                                        
                                                
                                        
                                        <td>
                    <a href="#" wire:click="destroy({{$us->id}})" class="btn btn-danger btn-sm delete" style="border-radius:10px" produk-id="{{$us->id}}">Delete</a>
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModal{{$us->id}}" style="border-radius:10px">Detail Komentar</a>
                    </td>
                  </tr>
                    
        
                        </tr>


                        @endforeach
                                        
                                        </tbody>
                                    </table>
                                </div>
                                    <center>
                        {{ $komen->links() }}
                        </center>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        
            @foreach ($komen as $key=>$us)
        
            <div class="modal fade" id="updateModal{{$us->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Komentar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped">
                      <tbody>
                          
                      <tr>
                        
                          <th>Nama</th>
                          <td>{{$us->user->nama_depan}} {{$us->user->nama_belakang}}</td>
                         
                        </tr>
                        <tr>
                        
                          <th>Produk</th>
                          <td>{{$us->produk->nama_produk}}</td>
                         
                        </tr>
                        <tr>
                         
                          <th>Komentar</th>
                          <td>{{$us->komentar}}</td>
                        
                        </tr>
                   <tr>
                         
                          <th></th>
                          <td>
                            <a href="#" class="btn btn-primary"  style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;">Detail Produk</a>    
                        </td>
                        
                        </tr>
                        
                    </table>
                  
                  </div>
                </div>
              </div>
            </div>	
            @endforeach
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
		    window.location = "/delete/"+produk_id+"/hapus";
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

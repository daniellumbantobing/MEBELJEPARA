@extends('layouts.master')
@section('title','User List')
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
                                   <h3 class="panel-title">Costumer</h3>
                                   
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
                                    <table class="table table-striped" id="table-datatables">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                {{-- <th>No HP</th> --}}
                                                <th>Email                                                </th>
                                                {{-- <th>Alamat</th>
                                                <th>Kota</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                     @foreach ($user as $key=>$us)
                         
                     
                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$us->nama_depan}} {{$us->nama_belakang}}</td>
                                                {{-- <td>{{$us->no_hp}}</td> --}}
                                                <td>{{$us->email}}</td>
                                                {{-- <td></td>
                                                <td></td> --}}
                                        <td>
                    <a href="#" wire:click="destroy({{$us->id}})" class="btn btn-danger btn-sm delete" style="border-radius:10px" produk-id="{{$us->id}}">Delete</a>
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateModal{{$us->id}}" style="border-radius:10px">Detail</a>
                    </td>
                  </tr>
                    
        
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
            @foreach ($user as $key=>$us)
        
            <div class="modal fade" id="updateModal{{$us->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                         
                          <th>Nama</th>
                          <td>{{$us->nama_depan}} {{$us->nama_belakang}}</td>
                        
                        </tr>
                  
                      
                        <tr>
                        
                          <th>Jenis Kelamin</th>
                          <td>{{$us->jenis_kelamin}}</td>
                         
                        </tr>
                        <tr>
                        
                          <th>No Hp</th>
                          <td>{{$us->no_hp}}</td>
                          
                        </tr>
                        <tr>
                        
                          <th>Email</th>
                          <td>{{$us->email}}</td>
                          
                        </tr>
                       
                        <tr>
                        
                          <th>Alamat</th>
                          <td>{{$us->alamat}}, {{$us->nama_kota}}, <br/> {{$us->nama_prov}}</td>
                          
                        </tr>
                        <tr>
                        
                          <th>Kode Pos</th>
                          <td>{{$us->kode_pos}}</td>
                          
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
		    window.location = "/user/"+produk_id+"/hapus";
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

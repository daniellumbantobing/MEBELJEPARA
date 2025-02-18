@extends('layouts.master')
@section('title','Produk')
@section('content')


    <!-- MAIN CONTENT -->
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
                                   <b><h3 class="panel-title">Kategori</b></h3>
                                   <div class="right">
                                   <a type="button" class="btn btn-primary" style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;" data-toggle="modal" data-target="#exampleModal">+ Tambah Kategori</a>
                                   </div>
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
									<table class="table table-striped" id="table-datatables">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kategori</th>
								        <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
                      @foreach ($kategori as $key=>$pd)
                  		<tr>
												<td>
                          {{++$key}} 
                        </td>
												<td>{{$pd->nama_kategori}}</td>
												
										<td>
                    <a href="#" class="btn btn-danger btn-sm delete" style="border-radius:10px" nama-produk="{{$pd->nama_kategori}}" produk-id="{{$pd->id}}"><i class="fas fa-trash-alt"></i></a>
										<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal{{$pd->id}}" style="border-radius:10px"><i class="fas fa-edit"></i></a>
                    </td>
                    <div class="modal fade" id="updateModal{{$pd->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Edit Produk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="/kategori/{{$pd->id}}/update" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group{{$errors->has('nama_kategori') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Nama Kategori</label>
                                    <input name="nama_kategori" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Produk" value="{{$pd->nama_kategori}}">
                                    @if($errors->has('nama_kategori'))
                                        <span class="help-block">{{$errors->first('nama_kategori')}}</span>
                                    @endif
                                  </div>
     
                               
                                 
                                 
                                  
                                      
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" style="float:left; border-radius:10px; background-color:#ffff; border-color:#CAA563;" data-dismiss="modal">Tutup</button>
                             <button type="submit" class="btn btn-primary"  style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;">Simpan</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>	
                </form>
                    	</tr>
                      @endforeach
										
										</tbody>
									</table>
               <center>   {{ $kategori->links() }}</center>
								</div>
                                  
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                      <b><h4 class="modal-title" id="exampleModalLabel">Tambah Kategori</h4></b>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form action="/addkategori" method="POST"  enctype="multipart/form-data">
                               @csrf
                               <div class="form-group{{$errors->has('nama_kategori') ? ' has-error' : ''}}">
                               <label for="exampleInputEmail1">Nama Produk</label>
                               <input name="nama_kategori" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kategori" value="{{old('nama_kategori')}}">
                               @if($errors->has('nama_kategori'))
                                   <span class="help-block">{{$errors->first('nama_kategori')}}</span>
                               @endif
                             </div>

                             
                                 
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" style="float:left; border-radius:10px; background-color:#ffff; border-color:#CAA563;" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary"  style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;">Simpan</button>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>	
    <!-- END MAIN CONTENT -->

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
      var nama_produk = $(this).attr('nama-produk');
		  swal({
		  title: "Konfirmasi Hapus",
		  text: "Apa kamu ingin menghapus data produk " +nama_produk + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/kategori/"+produk_id+"/hapus";
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

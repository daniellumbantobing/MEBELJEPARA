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
                                   <b><h3 class="panel-title">Data Produk</b></h3>
                                   <div class="right">
                                   <a type="button" class="btn btn-primary" style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;" data-toggle="modal" data-target="#exampleModal">+ Tambah Produk</a>
                                   </div>
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
									<table class="table table-striped" id="table-datatables">
										<thead>
											<tr>
												<th>Produk</th>
												<th>Kategori</th>
												<th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
											</tr>
										</thead>
										<tbody>
                      @foreach ($produk as $pd)
                  		<tr>
												<td>
                          <img src="/images/{{$pd->gambar}}" alt="Avatar" loading="lazy" class="img-fluid" style="width: 8rem;">
                          {{$pd->nama_produk}}
                        </td>
												<td>{{$pd->kategori->nama_kategori}}</td>
												<td>{{$pd->qty}}</td>
												<td>@currency($pd->harga)</td>
										<td>
                    <a href="#" class="btn btn-danger btn-sm delete" style="border-radius:10px" nama-produk="{{$pd->nama_produk}}" produk-id="{{$pd->id}}"><i class="fas fa-trash-alt"></i></a>
										<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal{{$pd->id}}" style="border-radius:10px"><i class="fas fa-edit"></i></a>
                  	<a href="{{url('produk/'.$pd->id.'/detail')}}" class="btn btn-success btn-sm" target="_blank" style="border-radius:10px"><i class="fas fa-eye"></i></a>
                  </td>
                    <div class="modal fade" id="updateModal{{$pd->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <b><h4 class="modal-title" id="exampleModalLabel">Edit Produk</h4></b>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="/produk/{{$pd->id}}/update" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group{{$errors->has('nama_produk') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input name="nama_produk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Produk" value="{{$pd->nama_produk}}">
                                    @if($errors->has('nama_produk'))
                                        <span class="help-block">{{$errors->first('nama_produk')}}</span>
                                    @endif
                                  </div>
     
                                  <div class="form-group{{$errors->has('nama_kategori') ? ' has-error' : ''}}">
                                     <label for="exampleInputEmail1">Kategori</label>
                                     <select class="form-control" name="kategori_id">
                                       <option value="{{$pd->kategori->id}}">{{$pd->kategori->nama_kategori}}</option>
                                       @foreach ($kategori as $kt)
                                       <option value="{{$kt->id}}">{{$kt->nama_kategori}}</option>
                                           
                                       @endforeach
                                       
                                     </select>
                                     @if($errors->has('kategori_id'))
                                         <span class="help-block">{{$errors->first('kategori_id')}}</span>
                                     @endif
                                   </div>
                                 
                                    <div class="form-group{{$errors->has('qty') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Stok</label>
                                    <input name="qty" type="number" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="qty" value="{{$pd->qty}}">
                                    @if($errors->has('qty'))
                                        <span class="help-block">{{$errors->first('qty')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group{{$errors->has('harga') ? ' has-error' : ''}}">
                                     <label for="exampleInputEmail1">Harga</label>
                                     <input name="harga" type="text" class="form-control" id="masking1" aria-describedby="emailHelp" placeholder="Harga" value="{{$pd->harga}}">
                                     @if($errors->has('harga'))
                                         <span class="help-block">{{$errors->first('harga')}}</span>
                                     @endif
                                   </div>
                                   <div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control  ckeditor" id="deskripsi" rows="6" >{{$pd->deskripsi}}</textarea>
                                    @if($errors->has('deskripsi'))
                                        <span class="help-block">{{$errors->first('deskripsi')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group{{$errors->has('gambar') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Gambar:</label><br>
                                    <img src="/images/{{$pd->gambar}}" alt="Avatar" cclass="img-circle" style="width: 120px;">
                                    <input name="gambar" type="file" class="form-control" id="gambar" aria-describedby="emailHelp" placeholder="gambar" value="{{old('gambar')}}">
                                    @if($errors->has('gambar'))
                                        <span class="help-block">{{$errors->first('gambar')}}</span>
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
               <center>   {{ $produk->links() }}</center>
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
                       <b><h4 class="modal-title" id="exampleModalLabel" >Tambah Produk</h4></b>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                     <div class="modal-body">
                       <form action="/addproduk" method="POST"  enctype="multipart/form-data">
                               @csrf
                               <div class="form-group{{$errors->has('nama_produk') ? ' has-error' : ''}}">
                               <label for="exampleInputEmail1">Nama Produk</label>
                               <input name="nama_produk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Produk" value="{{old('nama_produk')}}">
                               @if($errors->has('nama_produk'))
                                   <span class="help-block">{{$errors->first('nama_produk')}}</span>
                               @endif
                             </div>

                             <div class="form-group{{$errors->has('kategori_id') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">Kategori</label>
                                <select class="form-control" name="kategori_id">
                                  <option value="">Kategori</option>
                                  @foreach ($kategori as $kt)
                                  <option value="{{$kt->id}}">{{$kt->nama_kategori}}</option>
                                      
                                  @endforeach
                                  
                                </select>
                                @if($errors->has('kategori_id'))
                                    <span class="help-block">{{$errors->first('kategori_id')}}</span>
                                @endif
                              </div>
                            
                               <div class="form-group{{$errors->has('qty') ? ' has-error' : ''}}">
                               <label for="exampleInputEmail1">Stok</label>
                               <input name="qty" type="number" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="qty" value="{{old('qty')}}">
                               @if($errors->has('qty'))
                                   <span class="help-block">{{$errors->first('qty')}}</span>
                               @endif
                             </div>
                             <div class="form-group{{$errors->has('harga') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">Harga</label>
                                <input name="harga" type="text" class="form-control" id="masking2" aria-describedby="emailHelp" placeholder="Harga" value="{{old('harga')}}">
                                @if($errors->has('harga'))
                                    <span class="help-block">{{$errors->first('harga')}}</span>
                                @endif
                              </div>
                              <div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control  ckeditor" id="deskripsi" rows="6" >{{old('deskripsi')}}</textarea>
                                @if($errors->has('deskripsi'))
                                    <span class="help-block">{{$errors->first('deskripsi')}}</span>
                                @endif
                              </div>
                             <div class="form-group{{$errors->has('gambar') ? ' has-error' : ''}}">
                               <label for="exampleInputEmail1">Gambar:</label>
                               <input name="gambar" type="file" class="form-control" id="gambar" aria-describedby="emailHelp" placeholder="gambar" value="{{old('gambar')}}">
                               @if($errors->has('gambar'))
                                   <span class="help-block">{{$errors->first('gambar')}}</span>
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
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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
		  title: "Hapus Konfirmasi",
		  text: "Apa kamu ingin menghapus data produk " +nama_produk + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/produk/"+produk_id+"/hapus";
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

<script type="text/javascript">


$(document).ready(function(){
    $('#masking1').mask('#.##0', {reverse: true});
    
})
</script>
<script type="text/javascript">


$(document).ready(function(){
    $('#masking2').mask('#.##0', {reverse: true});
    
})
</script>
@endsection

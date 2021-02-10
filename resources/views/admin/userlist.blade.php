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
                                   <h3 class="panel-title">User</h3>
                                   
                               </div>
                               <div class="panel-body">
                                   
                                <div class="panel-body">
                                    <table class="table table-striped">
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
                                        {{-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" style="border-radius:10px">Detail</a> --}}
                    </td>
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="/produk/id/update" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group{{$errors->has('nama_produk') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input name="nama_produk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Produk" value="">
                                    @if($errors->has('nama_produk'))
                                        <span class="help-block">{{$errors->first('nama_produk')}}</span>
                                    @endif
                                  </div>
     
                                  <div class="form-group{{$errors->has('kategori_id') ? ' has-error' : ''}}">
                                     <label for="exampleInputEmail1">Kategori</label>
                                     <select class="form-control" name="kategori_id">
                                       <option value=""></option>
                                       <option value=""></option>
                                           
                                       
                                     </select>
                                     @if($errors->has('kategori_id'))
                                         <span class="help-block">{{$errors->first('kategori_id')}}</span>
                                     @endif
                                   </div>
                                 
                                    <div class="form-group{{$errors->has('qty') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Stok</label>
                                    <input name="qty" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="qty" value="">
                                    @if($errors->has('qty'))
                                        <span class="help-block">{{$errors->first('qty')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group{{$errors->has('harga') ? ' has-error' : ''}}">
                                     <label for="exampleInputEmail1">Harga</label>
                                     <input name="harga" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Harga" value="">
                                     @if($errors->has('harga'))
                                         <span class="help-block">{{$errors->first('harga')}}</span>
                                     @endif
                                   </div>
                                   <div class="form-group{{$errors->has('deskripsi') ? ' has-error' : ''}}">
                                     <label for="exampleInputEmail1">Deskripsi</label>
                                     <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" ></textarea>
                                     @if($errors->has('deskripsi'))
                                         <span class="help-block">{{$errors->first('deskripsi')}}</span>
                                     @endif
                                   </div>
                                  <div class="form-group{{$errors->has('gambar') ? ' has-error' : ''}}">
                                    <label for="exampleInputEmail1">Gambar:</label><br>
                                    <img src="/images/" alt="Avatar" cclass="img-circle" style="width: 120px;">
                                    <input name="gambar" type="file" class="form-control" id="gambar" aria-describedby="emailHelp" placeholder="gambar" value="{{old('gambar')}}">
                                    @if($errors->has('gambar'))
                                        <span class="help-block">{{$errors->first('gambar')}}</span>
                                    @endif
                                  </div>
     
                                      
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" style="float:left; border-radius:10px; background-color:#ffff; border-color:#CAA563;" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary"  style="border-radius:10px; background-color:#CAA563; border-color:#CAA563;">Update</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>	
        
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

@endsection

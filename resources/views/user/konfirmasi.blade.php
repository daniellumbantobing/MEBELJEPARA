@extends('dashboard.main')
@section('main')
<div class="container-fluid konfirm">
    <div class="col-12 col-md-6" style="margin: 0 auto;">
         <div class="card shadow mt-4">
  <div class="card-body">
    <div class="text-center">
      <h5>Terimakasih,</h5>
      <p style="color: #4D4D4D;">Transaksi akan diproses apabila Anda melakukan pembayaran 1 x 24 Jam </p>
      </div>
      <br>
      <div class="card-body">
      <h6>Transfer Ke Nomor Rekening :</h6>
      @if ($pesananpro->pemesanan->transfer_bank == "BRI")
       <img src="{{asset('user/assets/bri.jpg')}}" alt="BRI" class="card-img-top img-fluid" style="width:90px; height:60px; border: 1px solid #E5E5E5;"> 
        <br> <br>
        <h5>0987789</h5>
        <p style="color: #858585">Stasiun Mebel Jepara</p>
        <hr/>     
        <h6>Total Pembayaran:</h6>
        <h5>@currency($pesananpro->pemesanan->total_harga)</h5>
      @else
        <img src="{{asset('user/assets/bni.jpg')}}" alt="BRI" class="card-img-top img-fluid" style="width:90px; height:60px; border: 1px solid #E5E5E5;"> 
        <br> <br>
        <h5>0987789</h5>
        <p style="color: #858585">Stasiun Mebel Jepara</p>
        <hr/>     
        <h6>Total Pembayaran:</h6>
        <h5>@currency($pesananpro->pemesanan->total_harga)</h5>
      @endif

      <button class="btn btn-primary col-12 mt-4" data-toggle="modal" data-target="#exampleModal" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px; width: 100%;">Konfirmasi Pembayaran</button>
        </div>
    </div>
</div>
</div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form action="/bukti" method="POST" enctype="multipart/form-data">  
            @csrf
      <div class="form-group">
    <label for="formGroupExampleInput">Nama Pengirim</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Pengirim" name="nama" value="{{old('nama')}}">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Tanggal Transfer</label>
    <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="tanggal" value="{{old('tanggal')}}">
  </div>
  
  <div class="form-group">
    <label for="formGroupExampleInput">Bukti Pembayaran</label>
    <input type="file" class="form-control" id="formGroupExampleInput" placeholder="Example input" name="gambar" value="{{old('gambar')}}">
  </div>

       
    <input type="hidden" value="{{$pesananpro->pemesanan->id}}" name="pemesanan_id"> 




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary col-3" data-dismiss="modal"  style="background-color: white; border-color:#CAA563; border-radius:10px; color:#CAA563;">Close</button>
        <button type="submit" class="btn btn-primary col-3" style="background-color: #CAA563; border-color:#CAA563; border-radius:10px;">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>
   
@endsection
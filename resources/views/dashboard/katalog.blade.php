<?php
use App\Http\Controllers\Controller;
$kategori = Controller::mainCategories();
?>
@extends('dashboard.main')
@section('main')
    <div class="produk">
      <!-- Example single danger button -->
            <div class="row" style="margin-top:-18px;">
         
                <div class="col-12 col-md-12 mt-4">
                    <div class="text-center">
                        <h4>Katalog</h4>
                    </div>
                    <hr>
                    <div class="btn-group">
                        <button style="background-color: #fff; border-color:#CAA563; border-radius:10px;color:#CAA563" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Filter
                        </button>
                        <div class="dropdown-menu">
                              @foreach ($kategori as $kt)
                      <a class="dropdown-item" href="{{url('produk/'.$kt->nama_kategori)}}">{{$kt->nama_kategori}}</a>
                          
                      @endforeach
                              <a  class="dropdown-item" href="?terendah" name="terendah">Harga Terendah</a>
                              <a  class="dropdown-item" href="?tertinggi" name="tertinggi">Harga Tertinggi</a>
                         
                        </div>
                      </div>
                               
                    </div>
         
                          
             @foreach ($produk as $pr)
                <a href="/produk/{{$pr->id}}/detail">
                 <div class="col-6 col-md-4 mt-4">
                    <div class="card shadow">
                        <img src="/images/{{$pr->gambar}}" class="card-img-top img-fluid" alt="...">
                        </a>
                        <div class="card-body text-center">
                            <h6 class="card-title" style="color:#CAA563;">{{$pr->nama_produk}}</h6>
                            <h6 class="card-text">@currency($pr->harga)</h6>
                           
                        </div>
                    </div>
                </div>
             @endforeach
             </div>
             <div class="mx-auto my-2" style="width: 200px;">
               {{ $produk->links() }}
      
</div>
              
        </div>


@endsection
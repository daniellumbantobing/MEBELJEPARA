@extends('dashboard.main')
@section('main')
    <div class="produk" style="margin-top: 1rem;">
        @if($produk->count() == 0)
         <h6><strong>Hasil  Pencarian "{{$cari}}" tidak ada</strong></h6>
          <div class="col-md-12 mt-4">
              <div class="text-center">
              <img src="{{asset('user/assets/cari.png')}}" alt="img" style="width: 250px; height:200px;">
              <p>Produk yang Anda cari tidak dapat ditemukan</p>
              </div>
          </div>
    @else
                <h6><strong>Hasil  Pencarian "{{$cari}}"</strong></h6>
            <div class="row" style="margin-top:-18px;">
             @foreach ($produk as $pr)
                <a href="/produk/{{$pr->id}}/detail">
                 <div class="col-md-4 mt-4">
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
        @endif

@endsection
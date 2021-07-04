@extends('layouts.app')
@section('konten')
<main id="tg-main" class="tg-main tg-haslayout">
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-newrelease">

                @if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
				@endif

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tg-sectionhead">
                        <h2>Keranjang Buku</h2>
                    </div>
                    <div class="tg-description">
                        <p>Total Buku yang anda pinjam adalah : {{ count(Session::get('cart.items')) }} item buku </p>
                    </div>
                </div>
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                   <thead class="thead-light">
                       <tr>
                           <th>No</th>
                           <th>Foto Buku</th>
                           <th>Judul Buku</th>
                           <th>Penulis Buku</th>
                           <th>Penerbit Buku</th>
                           <th>Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach (Session::get('cart.items') as $cart)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td><img width="100" height="100" src = "{{ asset('storage/assets/foto_buku/'.$cart['foto_buku']) }}"></td>
                           <td>{{ $cart['judul_buku'] }}</td>
                           <td>{{ $cart['penulis_buku'] }}</td>
                           <td>{{ $cart['penerbit_buku'] }}</td>
                           <td>
                               <form action="{{ route('delete',$cart['id']) }}" method="POST">
                                   @csrf
                                <button onclick="return confirm('Apakah anda yakin ingin menghapus buku?')" type="submit" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus Buku</button>
                               </form>
                           </td>
                       </tr>
                       
                           
                       @endforeach
                       
                   </tbody>
               </table>
               <form action="{{ route('checkout') }}" method="POST">
                @csrf
               <a href="{{ route('home') }}" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Kembali</a>
               <button type="submit" onclick="return confirm('dengan klik checkout, anda akan meminjam buku ini')" class="btn btn-success">Checkout <i class="fa fa-sign-out"></i></button>
            </form>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
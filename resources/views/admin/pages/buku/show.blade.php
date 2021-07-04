@extends('admin.layouts.templates')

@section('konten')
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Detail Buku</h1>
            </div>

        </div>
    </div>
        <div class="col-lg-12">
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Data Buku</h2>
                </div>

                <!-- Body -->

                <div class="card-body">

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="judul_buku" class="col-sm-3 col-form-label input-label">Judul Buku</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="judul_buku" value="{{ $buku->judul_buku }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="penulis_buku" class="col-sm-3 col-form-label input-label">Penulis Buku</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="penulis_buku" value="{{ $buku->penulis_buku }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="penerbit_buku" class="col-sm-3 col-form-label input-label">Penerbit Buku</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="penerbit_buku" value="{{ $buku->penerbit_buku }}">
                        </div>
                    </div>
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="foto_buku" class="col-sm-3 col-form-label input-label">Foto Buku</label>

                        <div class="col-sm-9">
                            <a target="_blank" href="{{ url('storage/assets/foto_buku/'.$buku->foto_buku) }}">
                                <img width="200" class="rounded-image" height="200" src="{{ asset('storage/assets/foto_buku/'.$buku->foto_buku) }}" alt="{{ $buku->judul_buku }}">
                            </a>
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="tahun_penerbit" class="col-sm-3 col-form-label input-label">Tahun Penerbit</label>

                        <div class="col-sm-9">
                            <input type="number" readonly autocomplete="off" class="form-control" name="tahun_penerbit" value="{{ $buku->tahun_penerbit }}">
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="stok" class="col-sm-3 col-form-label input-label">Stok buku</label>

                        <div class="col-sm-9">
                            <input type="number" readonly autocomplete="off" class="form-control" name="stok" value="{{ $buku->stok }}">
                        </div>
                    </div>

                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->



            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
        </div>
        <div class="col-lg-12">
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Data Rak</h2>
                </div>

                <!-- Body -->

                <div class="card-body">

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="nama_rak" class="col-sm-3 col-form-label input-label">Nama Rak</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="nama_rak" value="{{ $buku->rak->nama_rak }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="penulis_buku" class="col-sm-3 col-form-label input-label">Penulis Buku</label>

                        <div class="col-sm-9">
                            <input type="text" readonly autocomplete="off" class="form-control" name="lokasi_rak" value="{{ $buku->rak->lokasi_rak }}">
                        </div>
                    </div>
                   
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->



            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
        </div>
</div>
</div>

</main>
@endsection
@extends('admin.layouts.templates')

@section('konten')
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Update Buku</h1>
            </div>

        </div>
    </div>
    <form method="POST" action="{{ url('admin/buku/'.$id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-lg-12">
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Data Buku</h2>
                </div>

                <!-- Body -->

                <div class="card-body">

                    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Gagal!</strong> Validasi Form Error<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="judul_buku" class="col-sm-3 col-form-label input-label">Judul Buku</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Ilmu Pengetahuan Alam" autocomplete="off" class="form-control" name="judul_buku" value="{{ $buku->judul_buku }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="penulis_buku" class="col-sm-3 col-form-label input-label">Penulis Buku</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Bagas" autocomplete="off" class="form-control" name="penulis_buku" value="{{ $buku->penulis_buku }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="penerbit_buku" class="col-sm-3 col-form-label input-label">Penerbit Buku</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Erlangga" autocomplete="off" class="form-control" name="penerbit_buku" value="{{ $buku->penerbit_buku }}">
                        </div>
                    </div>
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="nama_lengkap"  class="col-sm-3 col-form-label input-label">Foto Buku <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Format file PNG/JPG/JPEG"></i></label>

                        <div class="col-sm-9">
                            <img class="rounded-image mb-3" width="200" height="200" alt="{{ $buku->judul_buku }}" src="{{ asset('storage/assets/foto_buku/'.$buku->foto_buku) }}">
                            <input type="file" id="foto_buku" accept="image/*" class="form-control" name="foto_buku">
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="tahun_penerbit" class="col-sm-3 col-form-label input-label">Tahun Penerbit</label>

                        <div class="col-sm-9">
                            <input type="number" placeholder="2021" autocomplete="off" class="form-control" name="tahun_penerbit" value="{{ $buku->tahun_penerbit }}">
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="stok" class="col-sm-3 col-form-label input-label">Stok buku</label>

                        <div class="col-sm-9">
                            <input type="number" placeholder="100" autocomplete="off" class="form-control" name="stok" value="{{ $buku->stok }}">
                        </div>
                    </div>

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="stok" class="col-sm-3 col-form-label input-label">Kategori Rak buku</label>

                        <div class="col-sm-9">
                            <select id="id_rak" name="id_rak" class="form-control" style="width: 100%">
                                <option value="">-- Pilih Rak --</option>
                                @foreach($rak as $r)
                                <option value="{{ $r->id }}" {{ ($buku->id_rak == $r->id ? "selected":"") }}>{{ $r->nama_rak }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>
                <!-- End Body -->
                <!-- Footer -->

                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-success tambahPemohon">
                        <i class="tio-edit"></i> Update Buku
                    </button>

                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->



            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
        </div>
    </form>
</div>
</div>

</main>
<script>
    $('#id_rak').select2();
</script>
@endsection
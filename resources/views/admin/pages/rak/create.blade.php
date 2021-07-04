@extends('admin.layouts.templates')

@section('konten')
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Tambah Rak</h1>
            </div>

        </div>
    </div>
    <form method="POST" action="{{ url('admin/rak') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Data Rak</h2>
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
                        <label for="nama_rak" class="col-sm-3 col-form-label input-label">Nama Rak</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Buku Pengetahuan" autocomplete="off" class="form-control" name="nama_rak" value="{{ old('nama_rak') }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="lokasi_rak" class="col-sm-3 col-form-label input-label">Lokasi Rak</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Rak Buku A" autocomplete="off" class="form-control" name="lokasi_rak" value="{{ old('lokasi_rak') }}">
                        </div>
                    </div>
                </div>
                <!-- End Body -->
                <!-- Footer -->

                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary tambahPemohon">
                        <i class="tio-add-circle"></i> Tambah Rak
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
@endsection
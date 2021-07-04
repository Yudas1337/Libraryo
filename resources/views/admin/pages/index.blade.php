 @extends('admin.layouts.templates')

@section('konten')
<!-- Content -->
<main id="content" role="main" class="main">
 <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Halo! Selamat Datang {{ auth()->user()->nama }}</h1>
            </div>

        </div>
    </div>
    <!-- End Page Header -->
    <!-- Stats -->
             <div class="row gx-2 gx-lg-3">
                @if(auth()->user()->role == "admin")
                <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Petugas Aktif</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $petugas }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-danger">
                            <i class="tio-group-equal"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Petugas Nonaktif</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $pnonaktif }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-primary">
                            <i class="tio-group-equal"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Member</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $member }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-success">
                            <i class="tio-user"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Member Nonaktif</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $mnonaktif }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-warning">
                            <i class="tio-user"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Total User</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $user }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-danger">
                            <i class="tio-group-equal"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Total User Nonaktif</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $unonaktif }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-primary">
                            <i class="tio-group-equal"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Buku</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $buku }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-success">
                            <i class="tio-book"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Rak</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $rak }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-warning">
                            <i class="tio-archive"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            @endif
            @if(auth()->user()->role == "petugas" || auth()->user()->role == "admin")
            <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                <!-- Card -->
                    <div class="card card-hover-shadow h-100">
                        <div class="card-body">
                        <h6 class="card-subtitle">Total Peminjaman</h6>

                            <div class="row align-items-center gx-2 mb-1">
                                <div class="col-12">
                                <span class="card-title h2">{{ $peminjaman }}</span>
                                </div>

                            </div>
                        <!-- End Row -->

                        <span class="btn btn-soft-danger">
                            <i class="tio-notebook-bookmarked"></i>
                        </span>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            @endif
        </div>
        
        
    </div>
    <!-- End Stats -->



</div>
<!-- End Content -->

</main><!-- Footer -->
@endsection
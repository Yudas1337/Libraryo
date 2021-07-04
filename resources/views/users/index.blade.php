@extends('users.layouts.app')

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
                <div class="col-sm-6 col-lg-3 mb-6 mb-lg-5">
                    <!-- Card -->
                        <div class="card card-hover-shadow h-100">
                            <div class="card-body">
                            <h6 class="card-subtitle">Total Peminjaman</h6>
    
                                <div class="row align-items-center gx-2 mb-1">
                                    <div class="col-12">
                                    <span class="card-title h2">{{ $find }}</span>
                                    </div>
    
                                </div>
                            <!-- End Row -->
    
                            <span class="btn btn-soft-danger">
                                <i class="tio-book"></i>
                            </span>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                
        </div>
        
        
    </div>
    <!-- End Stats -->



</div>
<!-- End Content -->

</main><!-- Footer -->
@endsection
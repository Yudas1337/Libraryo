@extends('users.layouts.app')

@section('konten')
<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Halaman Detail Peminjaman</h1>
                </div>
               
            </div>
        </div>

        <!-- Card -->
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Buku Yang dipinjam</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark">{{ $count }}</span>
                        </div>

                        <div class="col-auto">
                            <span class="btn btn-soft-success p-1">
                                <i class="tio-book"></i>
                            </span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>
        
        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" autocomplete="off" class="form-control" placeholder="Cari Buku">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->
            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <form method="POST" action="{{ route('kembalikan') }}">
                    @csrf
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 2],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 15,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                   <p>Nota : {{ $nota }}</p>
                   <input hidden type="text" name="nota" value="{{ $nota }}" readonly>
                   <p>Dipinjam Oleh : {{ $member->user->first()->nama }} </p>
                   <p>Status : 
                    @if(date('Y-m-d',strtotime($member->tanggal_pinjam)) >= date('Y-m-d',strtotime($member->tanggal_kembali)) )
                    <span class="badge badge-danger"> Telat
                      {{ $hari = ceil(abs((strtotime($member->tanggal_pinjam) - strtotime($member->tanggal_kembali)) / 86400)) }} Hari</span>
                      <span class="badge badge-danger">Denda
                          {{ $hari*3000 }}
                      </span>
                      <input hidden type="text" name="denda" value="{{ $hari*3000 }}" readonly>
                    @else
                    <span class="badge badge-success">  
                      {{ $hari = ceil(abs((strtotime($member->tanggal_pinjam) - strtotime($member->tanggal_kembali)) / 86400)) }} Hari Lagi</span>
                      <input hidden type="text" name="denda" value="0" readonly>
                    @endif
                   </p>
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Foto Buku</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/assets/foto_buku/'.$b->buku->first()->foto_buku) }}" width="100" height="100" alt="{{ $b->buku->first()->judul_buku }}"></td>
                            <td>{{ $b->buku->first()->judul_buku }}</td>
                            <td>{{ $b->buku->first()->penulis_buku }}</td>
                            <td>{{ $member->tanggal_pinjam }}</td>
                            <td>{{ $member->tanggal_kembali }}</td>
                        </tr>
                        
                            
                        @endforeach
                        
                    </tbody>
                    <button onclick="return confirm('Apakah anda yakin ingin menyetujui?')" type="submit" class="btn btn-success m-2"><i class="tio-checkmark-circle"></i> Kembalikan Buku</button>
                    
                </table>
            </form>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="mr-2">Showing:</span>

                            <!-- Select -->
                            <select id="datatableEntries" class="js-select2-custom" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "customClass": "custom-select custom-select-sm custom-select-borderless",
                            "dropdownAutoWidth": true,
                            "width": true
                          }'>
                                <option value="10">10</option>
                                <option value="15" selected>15</option>
                                <option value="20">20</option>
                            </select>
                            <!-- End Select -->

                            <span class="text-secondary mr-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End Content -->


</main>

@endsection
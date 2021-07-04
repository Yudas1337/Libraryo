@extends('admin.layouts.templates')

@section('konten')
<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Halaman Pengembalian</h1>
                </div>
                <div class="col-sm-auto">
                    <a class="btn btn-danger" href="<?= url('admin/pengembalian/history') ?>">
                        <i class="tio-history"></i>
                        History Pengembalian
                    </a>
                </div>
            </div>
            
        </div>
        @if (session('status'))
        <div class="col-sm-6 col-lg-6 mb-3 mb-lg-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        </div>
    @endif
        

        <!-- Card -->
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Pengembalian</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark">{{ $count }}</span>
                        </div>

                        <div class="col-auto">
                            <span class="btn btn-soft-success p-1">
                                <i class="tio-notebook-bookmarked"></i>
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
                                <input id="datatableSearch" type="search" autocomplete="off" class="form-control" placeholder="Cari Pengembalian  ">
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
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nota</th>
                            <th>Nama Member</th>
                            <th>Nama Petugas</th>
                            <th>Batas Pengembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengembalian as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->nota }}</td>
                            <td class="table-column-pl-0">
                                <a class="d-flex align-items-center">
                                    <div class="avatar avatar-circle">
                                      <img class="avatar-img" src="{{($a->user->first()->jenis_kelamin == 'pria') ? asset('storage/assets/foto_user/default_male.jpg') : asset('storage/assets/foto_user/default_female.jpg')}}" alt="{{ $a->user->first()->nama }}">
                                    </div>
                                    <div class="ml-3">
                                      <span class="d-block h5 text-hover-primary mb-0">{{ $a->user->first()->nama }}</span>
                                      <span class="d-block font-size-sm text-body">{{ $a->user->first()->email }}</span>
                                    </div>
                                  </a>
                                </div>
                              </td>
                              <td class="table-column-pl-0">
                                <a class="d-flex align-items-center">
                                    <div class="avatar avatar-circle">
                                      <img class="avatar-img" src="{{($a->petugas->first()->jenis_kelamin == 'pria') ? asset('storage/assets/foto_user/default_male.jpg') : asset('storage/assets/foto_user/default_female.jpg')}}" alt="{{ $a->petugas->first()->nama }}">
                                    </div>
                                    <div class="ml-3">
                                      <span class="d-block h5 text-hover-primary mb-0">{{ $a->petugas->first()->nama }}</span>
                                      <span class="d-block font-size-sm text-body">{{ $a->petugas->first()->email }}</span>
                                    </div>
                                  </a>
                                </div>
                              </td>
                              <td>
                                  @if(date('Y-m-d',strtotime($a->peminjaman->tanggal_pinjam)) >= date('Y-m-d',strtotime($a->peminjaman->tanggal_kembali)) )
                                  <span class="badge badge-danger"> Telat
                                    {{ ceil(abs((strtotime($a->peminjaman->tanggal_pinjam) - strtotime($a->peminjaman->tanggal_kembali)) / 86400)) }} Hari</span>
                                  @else
                                  <span class="badge badge-success">  
                                    {{ ceil(abs((strtotime($a->peminjaman->tanggal_pinjam) - strtotime($a->peminjaman->tanggal_kembali)) / 86400)) }} Hari Lagi</span>
                                  @endif
                                </td>
                            <td>
                                    @csrf
                            <a target="_blank" href="{{ url("admin/peminjaman/detailPinjam/".$a->nota) }}" class="btn btn-danger btn-sm"><i class="tio-visible"></i>Lihat Detail Peminjaman</a>
                            </td>
                        </tr>
                        
                            
                        @endforeach
                        
                    </tbody>
                </table>
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
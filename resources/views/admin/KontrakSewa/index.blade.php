<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body id="pTipe-top">

  <!-- PTipe Wrapper -->
  <div id="wrapper">

  @include('layout.admin_sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin PTipe Content -->
        <div class="container-fluid">

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif

          <!-- PTipe Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Kontrak Sewa</h1>
            <div>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kontrak Sewa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>ID Kontrak Sewa</th>
                              <th>Tanggal Sewa</th>
                              <th>Tanggal Awal</th>
                              <th>Tanggal Akhir</th>
                              <th>Biaya Sewa</th>
                              <th>No Polisi</th>
                              <th>ID Penyewa</th>
                              <th>ID Pemakai</th>
                              <th>Status</th>
                              <th>Approval</th>
                              <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID Kontrak Sewa</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Biaya Sewa</th>
                                <th>No Polisi</th>
                                <th>ID Penyewa</th>
                                <th>ID Pemakai</th>
                                <th>Status</th>
                                <th>Approval</th>
                                <th>Keterangan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($kontrak_sewas as $kontrak_sewa)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$kontrak_sewa->id_kontraksewa}}</td>
                                  <td>{{$kontrak_sewa->tgl_sewa}}</td>
                                  <td>{{$kontrak_sewa->tgl_awal}}</td>
                                  <td>{{$kontrak_sewa->tgl_akhir}}</td>
                                  <td>{{$kontrak_sewa->biaya_sewa}}</td>
                                  <td>{{$kontrak_sewa->no_polisi}}</td>
                                  <td>{{$kontrak_sewa->id_penyewa}}</td>
                                  <td>{{$kontrak_sewa->id_pemakai}}</td>
                                  <td>{{$kontrak_sewa->status}}</td>
                                  <td>{{$kontrak_sewa->approval}}</td>
                                  <td>{{$kontrak_sewa->keterangan}}</td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

          <!-- Content Row -->
<div class="row">
  <div class="col-lg-6 mb-4">
      <div class="card shadow">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Status Pembelian Kendaraan</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>Status</th>
                              <th>Jumlah</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <th>Pengajuan Pembelian</th>
                              <th></th>
                          </tr>
                          <tr>
                              <td>Proses Approval</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Reject</td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Approved</td>
                              <td></td>
                          </tr>
                          <tr>
                              <th>Transaksi Pembelian</th>
                              <th></th>
                          </tr>
                          <tr>
                            <td>Proses Approval</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Reject</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Approved</td>
                            <td></td>
                        </tr>
                          <tr>
                              <th>Serah Terima Dealer ke Wahana</th>
                              <th></th>
                              
                          <tr>
                            <td>Proses Approval</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Reject</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Approved</td>
                            <td></td>
                        </tr>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Antrian Serah Terima Dealer to Wahana</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID SPPK</th>
                              <th colspan="2">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>ID SPPK</th>
                              <th colspan="2">Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($pengajuan_sewas as $pengajuan_sewa)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$pengajuan_sewa->id_sppk}}</td>
                              <td>
                                <a href="{{route('kontraksewa.create', ['id_sppk' => $pengajuan_sewa->id_sppk])}}" class="btn btn-success btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-credit-card"></i>
                                    </span>
                                    <span class="text">Buat</span>
                                </a>
                                
                              </td>
                              <td>
                                  <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $pengajuan_sewa->id_sppk }}">
                                      <span class="icon text-white-50">
                                          <i class="fas fa-info-circle"></i>
                                      </span>
                                      <span class="text">Detail</span>
                                  </button>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>

                  @foreach ($pengajuan_sewas as $pengajuan_sewa)
                    <div class="modal fade" id="detailModal{{ $pengajuan_sewa->id_sppk }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="detailModalLabel">Detail SPPK</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td colspan="4"><h5><b>Data Transaksi Pembelian</b></h5></td>
                                  </tr>
                                  <tr>
                                    <td><b>Id SPPK</b></td>
                                    <td><b>{{ $pengajuan_sewa->id_sppk }}</b></td>
                                    <td><b>Tanggal SPPK</b></td>
                                    <td>{{ $pengajuan_sewa->tgl_sppk }}</td>
                                  </tr>
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
              </div>
          </div>
      </div>
      <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Revisi Kontrak Sewa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Kontrak Sewa</th>
                            <th>Keterangan</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Kontrak Sewa</th>
                            <th>Keterangan</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($revisi_kontrak_sewas as $revisi_kontrak_sewa)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$revisi_kontrak_sewa->id_kontraksewa}}</td>
                            <td>
                              <a href="#" class="btn btn-primary btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-edit"></i>
                                  </span>
                                  <span class="text">Revisi</span>
                              </a>
                              
                            </td>
                            <td>
                                <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </button>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of PTipe Wrapper -->


  @include('layout.footer')
  <script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
  } );
  </script>
</body>

</html>
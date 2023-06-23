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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Data Transaksi Pembelian Kendaraan</h1>
            <div>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Pembayaran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pengajuan</th>
                                <th>ID Transaksi</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah</th>
                                <th>Bukti</th>
                                <th>Update</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID Pengajuan</th>
                                <th>ID Transaksi</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah</th>
                                <th>Bukti</th>
                                <th>Update</th>
                                <th>Approval</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($transaksi_pembelians as $transaksi_pembelian)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $transaksi_pembelian->id_pengajuanpembelian }}</td>
                                  <td>{{ $transaksi_pembelian->id_transaksipembelian }}</td>
                                  <td>{{ $transaksi_pembelian->tanggal_transaksi_p }}</td>
                                  <td>{{ $transaksi_pembelian->pembayaran_transaksi_p }}</td>
                                  <td>{{ $transaksi_pembelian->bukti_transaksi_p }}</td>
                                  <td>{{ $transaksi_pembelian->updated_at }}</td>
                                  <td>{{ $transaksi_pembelian->approval }}</td>
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
                              <th>{{count($all_pengajuan_pembelians)}}</th>
                          </tr>
                          <tr>
                              <td>Proses Approval</td>
                              <td>{{count($proses_pengajuan_pembelians)}}</td>
                          </tr>
                          <tr>
                              <td>Reject</td>
                              <td>{{count($revisi_pengajuan_pembelians)}}</td>
                          </tr>
                          <tr>
                              <td>Approved</td>
                              <td>{{count($approved_pengajuan_pembelians)}}</td>
                          </tr>
                          <tr>
                              <th>Transaksi Pembelian</th>
                              <th>{{count($transaksi_pembelians)}}</th>
                          </tr>
                          <tr>
                            <td>Proses Approval</td>
                            <td>{{count($proses_transaksi_pembelians)}}</td>
                        </tr>
                        <tr>
                            <td>Reject</td>
                            <td>{{count($revisi_transaksi_pembelians)}}</td>
                        </tr>
                        <tr>
                            <td>Approved</td>
                            <td>{{count($approved_transaksi_pembelians)}}</td>
                        </tr>
                          <tr>
                              <th>Serah Terima Dealer ke Wahana</th>
                              <td></td>
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
              <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Pembelian (Belum Dibayar)</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID Pengajuan</th>
                              <th>ID SPPK</th>
                              <th colspan="2">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>ID Pengajuan</th>
                              <th>ID SPPK</th>
                              <th colspan="2">Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                          @foreach ($pengajuan_pembelians as $pengajuan_pembelian)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $pengajuan_pembelian->id_pengajuanpembelian }}</td>
                              <td>{{ $pengajuan_pembelian->id_sppk }}</td>
                              <td>
                                <a href="{{ route('transaksipembelian.create', ['id_pengajuanpembelian' => $pengajuan_pembelian->id_pengajuanpembelian]) }}" class="btn btn-success btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-credit-card"></i>
                                    </span>
                                    <span class="text">Bayar</span>
                                </a>
                                
                              </td>
                              <td>
                                  <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $pengajuan_pembelian->id_pengajuanpembelian }}">
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
      <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Revisi Transaksi Pembelian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Keterangan</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Keterangan</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($revisi_transaksi_pembelians as $revisi_transaksi_pembelian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $revisi_transaksi_pembelian->id_transaksipembelian }}</td>
                            <td>{{ $revisi_transaksi_pembelian->keterangan }}</td>
                            <td>
                              <a href="{{ route('transaksipembelian.edit', $revisi_transaksi_pembelian->id_transaksipembelian)}}" class="btn btn-primary btn-icon-split btn-sm">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-edit"></i>
                                  </span>
                                  <span class="text">Revisi</span>
                              </a>
                              
                            </td>
                            <td>
                                <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $revisi_transaksi_pembelian->id_transaksipembelian }}">
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
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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Serah Terima Kendaraan Dealer to Wahana</h1>
            <div>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Serah Terima Delaer to Wahana</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Serah Terima</th>
                                <th>ID Pengajuan</th>
                                <th>No Polisi</th>
                                <th>Tanggal Serah Terima</th>
                                <th>Nama Penyerah</th>
                                <th>Nama Penerima</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID Serah Terima</th>
                                <th>ID Pengajuan</th>
                                <th>No Polisi</th>
                                <th>Tanggal Serah Terima</th>
                                <th>Nama Penyerah</th>
                                <th>Nama Penerima</th>
                                <th>Approval</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($stdealertowahanas as $stdealertowahana)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$stdealertowahana->id_stdealertowahana}}</td>
                                  <td>{{$stdealertowahana->id_pengajuanpembelian}}</td>
                                  <td>{{$stdealertowahana->no_polisi}}</td>
                                  <td>{{$stdealertowahana->tgl_st}}</td>
                                  <td>{{$stdealertowahana->nama_penyerah}}</td>
                                  <td>{{$stdealertowahana->nama_penerima}}</td>
                                  <td>{{$stdealertowahana->approval}}</td>

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
                              <th>{{count($pengajuan_pembelians)}}</th>
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
                              <th>{{count($stdealertowahanas)}}</th>
                              
                          <tr>
                            <td>Proses Approval</td>
                            <td>{{count($proses_stdealertowahanas)}}</td>
                        </tr>
                        <tr>
                            <td>Reject</td>
                            <td>{{count($revisi_stdealertowahanas)}}</td>
                        </tr>
                        <tr>
                            <td>Approved</td>
                            <td>{{count($approved_stdealertowahanas)}}</td>
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
                              <th>ID Pengajuan</th>
                              <th>ID Transaksi</th>
                              <th colspan="2">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>ID SPPK</th>
                              <th>ID Pengajuan</th>
                              <th>ID Transaksi</th>
                              <th colspan="2">Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($antrian_st as $antrian)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$antrian->id_sppk}}</td>
                              <td>{{$antrian->id_pengajuanpembelian}}</td>
                              <td>{{$antrian->id_transaksipembelian}}</td>
                              <td>
                                <a href="{{route('stdealertowahana.create', ['id_transaksipembelian' => $antrian->id_pengajuanpembelian])}}" class="btn btn-success btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-credit-card"></i>
                                    </span>
                                    <span class="text">Buat</span>
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
                  {{-- @foreach ($transaksi_pembelians as $transaksi_pembelian)
                    <div class="modal fade" id="detailModal{{ $transaksi_pembelian->id_transaksipembelian }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="detailModalLabel">Detail Transaksi Pembelian</h4>
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
                                    <td><b>Id Transaksi</b></td>
                                    <td><b>{{ $transaksi_pembelian->id_transaksipembelian }}</b></td>
                                    <td><b>Tanggal Transaksi</b></td>
                                    <td>{{ $transaksi_pembelian->tanggal_transaksi_p }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Pembayaran Transaksi</b></td>
                                    <td colspan="3">{{$transaksi_pembelian->pembayaran_transaksi_p}}</td>
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
                    @endforeach --}}
              </div>
          </div>
      </div>
      <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Revisi Serah Terima Dealer to Wahana</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Serah Terima</th>
                            <th>No Polisi</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Serah Terima</th>
                            <th>No Polisi</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($revisi_stdealertowahanas as $revisi_stdealertowahana)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $revisi_stdealertowahana->id_stdealertowahana }}</td>
                            <td>{{ $revisi_stdealertowahana->no_polisi }}</td>
                            <td>
                              <a href="{{route('stdealertowahana.edit', ['no_polisi' => $revisi_stdealertowahana->no_polisi])}}" class="btn btn-primary btn-icon-split btn-sm">
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
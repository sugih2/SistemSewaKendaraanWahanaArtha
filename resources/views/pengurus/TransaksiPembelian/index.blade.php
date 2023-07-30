<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body id="pTipe-top">

  <!-- PTipe Wrapper -->
  <div id="wrapper">

  @include('layout.pengurus_sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin PTipe Content -->
        <div class="container-fluid">

          @if (session('reject'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('reject') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif
          @if (session('approved'))
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
                          @foreach ($all_transaksi_pembelians as $transaksi_pembelian)
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
                                      <th>{{count($all_transaksi_pembelians)}}</th>
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
              <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Approval Transaksi Pembelian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                      <th>No</th>
                                      <th>ID Pengajuan</th>
                                      <th>ID Transaksi</th>
                                      <th>Tanggal Pembayaran</th>
                                      <th>Jumlah</th>
                                      <th>Bukti</th>
                                      <th colspan="3">Aksi</th>
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
                                      <th colspan="3">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($proses_transaksi_pembelians as $proses_transaksi_pembelian)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $proses_transaksi_pembelian->id_pengajuanpembelian }}</td>
                                      <td>{{ $proses_transaksi_pembelian->id_transaksipembelian }}</td>
                                      <td>{{ $proses_transaksi_pembelian->tanggal_transaksi_p }}</td>
                                      <td>{{ $proses_transaksi_pembelian->pembayaran_transaksi_p }}</td>
                                      <td>{{ $proses_transaksi_pembelian->bukti_transaksi_p }}</td>
                                      <td>
                                        <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{ $proses_transaksi_pembelian->id_transaksipembelian }}">
                                          <span class="icon text-white-50">
                                              <i class="fas fa-flag"></i>
                                          </span>
                                          <span class="text">Reject</span>
                                        </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{ $proses_transaksi_pembelian->id_transaksipembelian }}">
                                          <span class="icon text-white-50">
                                              <i class="fas fa-thumbs-up"></i>
                                          </span>
                                          <span class="text">Setuju</span>
                                      </button>
                                      </td>
                                      <td>
                                        <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $proses_transaksi_pembelian->id_transaksipembelian }}">
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
                        @foreach ($proses_transaksi_pembelians as $proses_transaksi_pembelian)
                        <!-- Modal Detail pengajuan_pembelian -->
                        <div class="modal fade" id="detailModal{{ $proses_transaksi_pembelian->id_transaksipembelian }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
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
                                      <td colspan="2"><b>ID Pengajuan Pembelian</b></td>
                                      <td><b>{{ $proses_transaksi_pembelian->id_pengajuanpembelian }}</b></td>
                                      <td colspan="2"><b>ID Transaksi Pembelian</b></td>
                                      <td><b>{{ $proses_transaksi_pembelian->id_transaksipembelian }}</b></td>
                                      </tr>
                                      <tr>
                                      <td><b>Tanggal Pembayaran</b></td>
                                      <td>{{ $proses_transaksi_pembelian->tanggal_transaksi_p }}</td>
                                      <td><b>Jumlah</b></td>
                                      <td>{{ $proses_transaksi_pembelian->pembayaran_transaksi_p }}</td>
                                      <td><b>Bukti</b></td>
                                      <td>{{ $proses_transaksi_pembelian->bukti_transaksi_p }}</td>
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

                        <!-- Modal Approve pengajuan_pembelian -->
                        <div class="modal fade" id="approveModal{{ $proses_transaksi_pembelian->id_transaksipembelian }}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="approveModalLabel">Approve Pengajuan Pembelian</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <form action="{{route('transaksipembelian.approved', $proses_transaksi_pembelian->id_pengajuanpembelian)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success"><span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                        </span> Setuju</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                              </div>
                          </div>
                        </div>

                        <!-- Modal Reject pengajuan_pembelian -->
                        <div class="modal fade" id="rejectModal{{ $proses_transaksi_pembelian->id_transaksipembelian }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="rejectModalLabel">Reject pengajuan_pembelian</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <form action="{{route('transaksipembelian.reject', $proses_transaksi_pembelian->id_transaksipembelian)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                      <div class="row">
                                        <table class="table">
                                        <tbody>
                                            <tr>
                                            <td colspan="2"><b>ID Pengajuan Pembelian</b></td>
                                            <td><b>{{ $proses_transaksi_pembelian->id_pengajuanpembelian }}</b></td>
                                            <td colspan="2"><b>ID Transaksi Pembelian</b></td>
                                            <td><b>{{ $proses_transaksi_pembelian->id_transaksipembelian }}</b></td>
                                            </tr>
                                            <tr>
                                            <td><b>Tanggal Pembayaran</b></td>
                                            <td>{{ $proses_transaksi_pembelian->tanggal_transaksi_p }}</td>
                                            <td><b>Jumlah</b></td>
                                            <td>{{ $proses_transaksi_pembelian->pembayaran_transaksi_p }}</td>
                                            <td><b>Bukti</b></td>
                                            <td>{{ $proses_transaksi_pembelian->bukti_transaksi_p }}</td>
                                            </tr>
                                            <tr>
                                            <td><b>Keterangan</b></td>
                                            <td colspan="5"><input type="text" class="form-control" name="keterangan" id="keterangan"></td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger"><span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                        </span> Reject</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                              </div>
                          </div>
                        </div>
                        @endforeach
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
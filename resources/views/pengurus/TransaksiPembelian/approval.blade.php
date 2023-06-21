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
            <h1 class="h3 mb-0 text-gray-800">Approval Transaksi Pembelian</h1>
          </div>

          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Pembelian (Proses Approval)</h6>
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
                                    <th>Update</th>
                                    <th>Approval</th>
                                    <th colspan="3">Aksi</th>
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
                                    <td>
                                      <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{ $transaksi_pembelian->id_transaksipembelian }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Reject</span>
                                      </button>
                                    </td>
                                    <td>
                                      <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{ $transaksi_pembelian->id_transaksipembelian }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-thumbs-up"></i>
                                        </span>
                                        <span class="text">Setuju</span>
                                    </button>
                                    </td>
                                    <td>
                                      <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $transaksi_pembelian->id_transaksipembelian }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                      </button>
                                    </td>
                                </tr>
                                <!-- Modal Detail pengajuan_pembelian -->
                                <div class="modal fade" id="detailModal{{ $transaksi_pembelian->id_transaksipembelian }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="detailModalLabel">Detail Transaksi Pembelian</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <!-- Kolom pertama -->
                                                  <p>ID Transaksi: {{ $transaksi_pembelian->id_transaksipembelian }}</p>
                                              </div>
                                              <div class="col-md-6">
                                                  <!-- Kolom kedua -->
                                                  <p>ID Pengajuan: {{ $transaksi_pembelian->id_pengajuanpembelian }}</p>
                                                  <!-- Tambahkan informasi detail lainnya sesuai kebutuhan -->
                                              </div>
                                          </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                                <!-- Modal Approve pengajuan_pembelian -->
                                <div class="modal fade" id="approveModal{{ $transaksi_pembelian->id_transaksipembelian }}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="approveModalLabel">Approve Pengajuan Pembelian</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <form action="{{route('transaksipembelian.approved', $transaksi_pembelian->id_pengajuanpembelian)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="approval" value="Approved" hidden>
                                                    <input type="text" class="form-control" name="status_transaksi" value="Sudah Dibayar" hidden>
                                                </div>
                                            </div>
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
                                <div class="modal fade" id="rejectModal{{ $transaksi_pembelian->id_transaksipembelian }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="rejectModalLabel">Reject pengajuan_pembelian</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <form action="{{route('transaksipembelian.reject', $transaksi_pembelian->id_transaksipembelian)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Kolom pertama -->
                                                    <p>ID Transaksi: {{ $transaksi_pembelian->id_transaksipembelian }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Kolom kedua -->
                                                    <p>ID Pengajuan: {{ $transaksi_pembelian->id_pengajuanpembelian }}</p>
                                                    <!-- Tambahkan informasi detail lainnya sesuai kebutuhan -->
                                                </div>
                                              </div>
                                            <div class="row">
                                              <div class="form-group">
                                                <label for="keterangan">Keterangan:</label>
                                                <input type="text" class="form-control" name="keterangan" id="keterangan">
                                                <input type="text" class="form-control" name="approval" value="Reject" hidden>
                                              </div>
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
                          </tbody>
                      </table>
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
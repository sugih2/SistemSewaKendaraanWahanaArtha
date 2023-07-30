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

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif
          @if (session('reject'))
            <div class="alert alert-warning alert-dismissible fade show">
                {{ session('reject') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif

          <!-- PTipe Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Data Pengajuan Pembelian Kendaraan</h1>
            <div>

              <a href="{{ route('pengajuanpembelian.pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          

          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Pembelian</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>ID Pengajuan</th>
                                  <th>SPPK</th>
                                  <th>Dealer</th>
                                  <th>Merk</th>
                                  <th>Tipe</th>
                                  <th>Tahun</th>
                                  <th>Warna</th>
                                  <th>Deskripsi</th>
                                  <th>Harga</th>
                                  <th>BBN</th>
                                  <th>OTR</th>
                                  <th>Karoseri</th>
                                  <th>Total</th>
                                  <th>Approval</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>ID Pengajuan</th>
                                  <th>SPPK</th>
                                  <th>Dealer</th>
                                  <th>Merk</th>
                                  <th>Tipe</th>
                                  <th>Tahun</th>
                                  <th>Warna</th>
                                  <th>Deskripsi</th>
                                  <th>Harga</th>
                                  <th>BBN</th>
                                  <th>OTR</th>
                                  <th>Karoseri</th>
                                  <th>Total</th>
                                  <th>Approval</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($pengajuan_pembelians as $pengajuan_pembelian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengajuan_pembelian->id_pengajuanpembelian }}</td>
                                    <td>{{ $pengajuan_pembelian->id_pengajuanpembelian }}</td>
                                    <td>{{ $pengajuan_pembelian->dealer }}</td>
                                    <td>{{ $pengajuan_pembelian->merk }}</td>
                                    <td>{{ $pengajuan_pembelian->tipe }}</td>
                                    <td>{{ $pengajuan_pembelian->tahun }}</td>
                                    <td>{{ $pengajuan_pembelian->warna }}</td>
                                    <td>{{ $pengajuan_pembelian->deskripsi }}</td>
                                    <td>Rp.{{ $pengajuan_pembelian->harga }}</td>
                                    <td>{{ $pengajuan_pembelian->bbn }}</td>
                                    <td>{{ $pengajuan_pembelian->otr }}</td>
                                    <td>{{ $pengajuan_pembelian->karoseri }}</td>
                                    <td>{{ $pengajuan_pembelian->total }}</td>
                                    <td>{{ $pengajuan_pembelian->approval }}</td>
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
              <h6 class="m-0 font-weight-bold text-primary">Approval Pengajuan Pembelian</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>ID Pengajuan Pembelian</th>
                              <th colspan="3">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>ID Pengajuan Pembelian</th>
                              <th colspan="3">Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($approval_pengajuan_pembelians as $approval_pengajuan_pembelian)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$approval_pengajuan_pembelian->id_pengajuanpembelian}}</td>
                              <td>
                                  <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{ $approval_pengajuan_pembelian->id_pengajuanpembelian }}">
                                      <span class="icon text-white-50">
                                          <i class="fas fa-flag"></i>
                                      </span>
                                      <span class="text">Reject</span>
                                  </button>
                              </td>
                              <td>
                              <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{ $approval_pengajuan_pembelian->id_pengajuanpembelian }}">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-check-square"></i>
                                  </span>
                                  <span class="text">Approve</span>
                              </button>
                              
                              </td>
                              <td>
                                  <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $approval_pengajuan_pembelian->id_pengajuanpembelian }}">
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
                  @foreach ($approval_pengajuan_pembelians as $approval_pengajuan_pembelian)
                  <!-- Modal Approve pengajuan_pembelian -->
                  <div class="modal fade" id="approveModal{{ $approval_pengajuan_pembelian->id_pengajuanpembelian}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="approveModalLabel">Approve Pengajuan Pembelian</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-footer">
                                  <form action="{{route('pengajuanpembelian.approved', $approval_pengajuan_pembelian->id_pengajuanpembelian)}}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <button type="submit" class="btn btn-success">
                                          <span class="icon text-white-50">
                                              <i class="fas fa-check"></i>
                                          </span> Setuju
                                      </button>
                                  </form>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Modal Reject Pengajuan Sewa -->
                  <div class="modal fade" id="rejectModal{{ $approval_pengajuan_pembelian->id_pengajuanpembelian}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                      <div class="modal-dialog  modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="rejectModalLabel">Reject Pengajuan Pembelian</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form action="{{route('pengajuanpembelian.reject', $approval_pengajuan_pembelian->id_pengajuanpembelian)}}" method="POST">
                                  @csrf
                                  @method('PUT')
                              <div class="modal-body">
                                  <div class="row">
                                      <table class="table">
                                      <tbody>
                                          <tr>
                                          <td colspan="2"><b>ID Pengajuan Pembelian</b></td>
                                          <td colspan="4"><b>{{ $approval_pengajuan_pembelian->id_pengajuanpembelian }}</b></td>
                                          </tr>
                                          <tr>
                                          <td colspan="6"><h5><b>Penawaran Harga Kendaraan</b></h5></td>
                                          </tr>
                                          <tr>
                                          <td><b>Dealer</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->nama_p_dealer }}</td>
                                          <td><b>Tanggal</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->tanggal_p_dealer }}</td>
                                          <td><b>Harga</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->harga_p_dealer }}</td>
                                          </tr>
                                          <tr>
                                          <td colspan="6"><h5><b>Penawaran Harga Karoseri</b></h5></td>
                                          </tr>
                                          <tr>
                                          <td><b>Nama PT</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->nama_pt_karoseri }}</td>
                                          <td><b>Tanggal</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->tanggal_p_karoseri }}</td>
                                          <td><b>Harga</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->harga_p_karoseri }}</td>
                                          </tr>
                                          <tr>
                                          <td colspan="6"><h5><b>Kendaraan Yang Diajukan</b></h5></td>
                                          </tr>
                                          <tr>
                                          <td><b>Dealer</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->dealer }}</td>
                                          <td><b>Dealer</b></td>
                                          <td></td>
                                          <td><b>Harga Off</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->harga }}</td>
                                          </tr>
                                          <tr>
                                          <td><b>Merk</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->merk }}</td>
                                          <td><b>Deskripsi</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->deskripsi }}</td>
                                          <td><b>BBN</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->bbn }}</td>
                                          </tr>
                                          <tr>
                                          <td><b>Tipe</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->tipe }}</td>
                                          <td></td>
                                          <td></td>
                                          <td><b>OTR</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->otr }}</td>
                                          </tr>
                                          <tr>
                                          <td><b>Tahun</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->tahun }}</td>
                                          <td></td>
                                          <td></td>
                                          <td><b>Karoseri</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->karoseri }}</td>
                                          </tr>
                                          <tr>
                                          <td><b>Warna</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->warna }}</td>
                                          <td></td>
                                          <td></td>
                                          <td><b>Total</b></td>
                                          <td>{{ $approval_pengajuan_pembelian->total }}</td>
                                          </tr>
                                          <tr>
                                              <td><b>Keterangan</b></td>
                                              <td colspan="6"><input type="text" class="form-control" name="keterangan"></td>
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
                  <div class="modal fade" id="detailModal{{ $approval_pengajuan_pembelian->id_pengajuanpembelian }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
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
                                  <td colspan="2"><b>ID Pengajuan Pembelian</b></td>
                                  <td colspan="4"><b>{{ $approval_pengajuan_pembelian->id_pengajuanpembelian }}</b></td>
                                  </tr>
                                  <tr>
                                  <td colspan="6"><h5><b>Penawaran Harga Kendaraan</b></h5></td>
                                  </tr>
                                  <tr>
                                  <td><b>Dealer</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->nama_p_dealer }}</td>
                                  <td><b>Tanggal</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->tanggal_p_dealer }}</td>
                                  <td><b>Harga</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->harga_p_dealer }}</td>
                                  </tr>
                                  <tr>
                                  <td colspan="6"><h5><b>Penawaran Harga Karoseri</b></h5></td>
                                  </tr>
                                  <tr>
                                  <td><b>Nama PT</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->nama_pt_karoseri }}</td>
                                  <td><b>Tanggal</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->tanggal_p_karoseri }}</td>
                                  <td><b>Harga</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->harga_p_karoseri }}</td>
                                  </tr>
                                  <tr>
                                  <td colspan="6"><h5><b>Kendaraan Yang Diajukan</b></h5></td>
                                  </tr>
                                  <tr>
                                  <td><b>Dealer</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->dealer }}</td>
                                  <td><b>Dealer</b></td>
                                  <td></td>
                                  <td><b>Harga Off</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->harga }}</td>
                                  </tr>
                                  <tr>
                                  <td><b>Merk</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->merk }}</td>
                                  <td><b>Deskripsi</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->deskripsi }}</td>
                                  <td><b>BBN</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->bbn }}</td>
                                  </tr>
                                  <tr>
                                  <td><b>Tipe</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->tipe }}</td>
                                  <td></td>
                                  <td></td>
                                  <td><b>OTR</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->otr }}</td>
                                  </tr>
                                  <tr>
                                  <td><b>Tahun</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->tahun }}</td>
                                  <td></td>
                                  <td></td>
                                  <td><b>Karoseri</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->karoseri }}</td>
                                  </tr>
                                  <tr>
                                  <td><b>Warna</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->warna }}</td>
                                  <td></td>
                                  <td></td>
                                  <td><b>Total</b></td>
                                  <td>{{ $approval_pengajuan_pembelian->total }}</td>
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
    $('#dataTable, #harga').DataTable();
  }
  function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        } );
  </script>
</body>

</html>
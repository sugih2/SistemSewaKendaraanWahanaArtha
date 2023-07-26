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

          <!-- PTipe Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Serah Terima Kendaraan Wahana to Cabang</h1>
            <div>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Berita Serah Terima Wahana to Cabang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Serah Terima</th>
                                <th>ID Kontrak Sewa</th>
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
                                <th>ID Kontrak Sewa</th>
                                <th>No Polisi</th>
                                <th>Tanggal Serah Terima</th>
                                <th>Nama Penyerah</th>
                                <th>Nama Penerima</th>
                                <th>Approval</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($stwahanatocabangs as $stwahanatocabang)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$stwahanatocabang->id_stwahanatocabang}}</td>
                                  <td>{{$stwahanatocabang->id_kontraksewa}}</td>
                                  <td>{{$stwahanatocabang->no_polisi}}</td>
                                  <td>{{$stwahanatocabang->tgl_st}}</td>
                                  <td>{{$stwahanatocabang->nama_penyerah}}</td>
                                  <td>{{$stwahanatocabang->nama_penerima}}</td>
                                  <td>{{$stwahanatocabang->approval}}</td>
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
                              <td></td>
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
                              <td></td>
                              
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
      <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Approval Serah Terima Wahana to Cabang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Serah Terima</th>
                            <th colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Serah Terima</th>
                            <th colspan="3">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($proses_stwahanatocabangs as $proses_stwahanatocabang)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$proses_stwahanatocabang->id_stwahanatocabang}}</td>
                            <td>
                                <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{$proses_stwahanatocabang->id_stwahanatocabang}}">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-flag"></i>
                                  </span>
                                  <span class="text">Reject</span>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{$proses_stwahanatocabang->id_stwahanatocabang}}">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-thumbs-up"></i>
                                  </span>
                                  <span class="text">Setuju</span>
                                </button>
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
                @foreach ($proses_stwahanatocabangs as $proses_stwahanatocabang)
                <!-- Modal Approve pengajuan_pembelian -->
                <div class="modal fade" id="approveModal{{$proses_stwahanatocabang->id_stwahanatocabang}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="approveModalLabel">Approve Serah Terima Kendaraan Wahana to Cabang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('stwahanatocabang.approved', ['id_stwahanatocabang' => $proses_stwahanatocabang->id_stwahanatocabang])}}" method="POST">
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
                <div class="modal fade" id="rejectModal{{$proses_stwahanatocabang->id_stwahanatocabang}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel">Reject Serah Terima Kendaraan Wahana to Cabang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('stwahanatocabang.reject', ['id_stwahanatocabang' => $proses_stwahanatocabang->id_stwahanatocabang])}}" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="modal-body">
                                <div class="row">
                                    <table class="table">
                                    <tbody>
                                      <tr>
                                          <td><b>ID Serah Terima</b></td>
                                          <td colspan="2"><b>{{ $proses_stwahanatocabang->id_stwahanatocabang }}</b></td>
                                          <td><b>No Polisi</b></td>
                                          <td colspan="2"><b>{{ $proses_stwahanatocabang->no_polisi }}</b></td>
                                          </tr>
                                          <tr>
                                          <td colspan="6"><h5><b>Data Berita Serah Terima Kendaraan Dealer to Wahana</b></h5></td>
                                          </tr>
                                          <tr>
                                          <td><b>Tanggal Serah Terima</b></td>
                                          <td colspan="5">{{ $proses_stwahanatocabang->tgl_st }}</td>
                                          </tr>
                                          <tr>
                                          <td><b>Nama yang menyerahkan</b></td>
                                          <td colspan="2">{{ $proses_stwahanatocabang->nama_penyerah }}</td>
                                          <td><b>Nama yang menerima</b></td>
                                          <td colspan="2">{{ $proses_stwahanatocabang->nama_penerima }}</td>
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
                                  <button type="submit" class="btn btn-success"><span class="icon text-white-50">
                                  <i class="fas fa-check"></i>
                                  </span> Setuju</button>
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
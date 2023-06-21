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
            <h1 class="h3 mb-0 text-gray-800">Approval Tambah Pengajuan Pembelian</h1>
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
                                    <th colspan="3">Aksi</th>
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
                                    <th colspan="3">Aksi</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($pengajuan_pembelians as $pengajuan_pembelian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengajuan_pembelian->id_pengajuanpembelian }}</td>
                                    <td>{{ $pengajuan_pembelian->id_sppk }}</td>
                                    <td>{{ $pengajuan_pembelian->dealer }}</td>
                                    <td>{{ $pengajuan_pembelian->merk }}</td>
                                    <td>{{ $pengajuan_pembelian->tipe }}</td>
                                    <td>{{ $pengajuan_pembelian->tahun }}</td>
                                    <td>{{ $pengajuan_pembelian->warna }}</td>
                                    <td>{{ $pengajuan_pembelian->deskripsi }}</td>
                                    <td>{{ $pengajuan_pembelian->harga }}</td>
                                    <td>{{ $pengajuan_pembelian->bbn }}</td>
                                    <td>{{ $pengajuan_pembelian->otr }}</td>
                                    <td>{{ $pengajuan_pembelian->karoseri }}</td>
                                    <td>{{ $pengajuan_pembelian->total }}</td>
                                    <td>{{ $pengajuan_pembelian->approval }}</td>
                                    <td>
                                      <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{ $pengajuan_pembelian->id_pengajuanpembelian }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Reject</span>
                                      </button>
                                    </td>
                                    <td>
                                      <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{ $pengajuan_pembelian->id_pengajuanpembelian }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-thumbs-up"></i>
                                        </span>
                                        <span class="text">Setuju</span>
                                    </button>
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
                                <!-- Modal Detail pengajuan_pembelian -->
                            @foreach ($pengajuan_pembelians as $pengajuan_pembelian)
                                <div class="modal fade" id="detailModal{{ $pengajuan_pembelian->id_pengajuanpembelian }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="detailModalLabel">Detail Pengajuan Pembelian</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <table class="table">
                                                <tbody>
                                                  <!-- Kolom pertama -->
                                                  <tr>
                                                    <td colspan ="4"><h5><b>Data Pengajuan Pembelian</b></h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td><b>No Polisi</b></td>
                                                    <td><b>{{ $pengajuan_pembelian->id_pengajuanpembelian }}</b></td>
                                                    <td><b>Merk:</b></td> 
                                                    <td><b>{{ $pengajuan_pembelian->merk }}</b></td>
                                                  </tr>
                                                  <tr>
                                                    <td><b>Tipe:</b></td>
                                                    <td><b>{{ $pengajuan_pembelian->tipe }}</b></td>
                                                    <td><b>Warna:</b></td> 
                                                    <td><b>{{ $pengajuan_pembelian->warna }}</b></td>
                                                  </tr>
                                                  <tr>
                                                    <td><b>Tanggal Beli:</b></td>
                                                    <td><b>{{ $pengajuan_pembelian->tanggal_beli }}</b></td>
                                                  </tr>
                                                    <td colspan="4"><h5><b>Data Pembelian</b></h5></td>
                                                  </tr>
                                                  <tr>
                                                    <td><b>Harga Off:</b></td>
                                                    <td><b>Rp.{{ $pengajuan_pembelian->harga }}</b></td>
                                                    <td><b>BBN:</b></td> 
                                                    <td><b>Rp.{{ $pengajuan_pembelian->bbn }}</b></td>
                                                  </tr>
                                                  <tr>
                                                    <td><b>OTR:</b></td>
                                                    <td><b>Rp.{{ $pengajuan_pembelian->otr }}</b></td>
                                                    <td><b>Karoseri:</b></td> 
                                                    <td><b>Rp.{{ $pengajuan_pembelian->karoseri }}</b></td>
                                                  </tr>
                                                  <tr>
                                                    <td><b>Total Pembelian:</b></td>
                                                    <td><b>Rp.{{ $pengajuan_pembelian->total }}</b></td>
                                                    <td><b>Tahun:</b></td> 
                                                    <td><b>{{ $pengajuan_pembelian->tahun }}</b></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                           @endforeach 
                                <!-- Modal Approve pengajuan_pembelian -->
                                @foreach ($pengajuan_pembelians as $pengajuan_pembelian)
                                <div class="modal fade" id="approveModal{{ $pengajuan_pembelian->id_pengajuanpembelian }}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="approveModalLabel">Approve Pengajuan Pembelian</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <form action="{{route('pengajuanpembelian.approved', $pengajuan_pembelian->id_pengajuanpembelian)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="approval" value="Approved" hidden>
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

                                <!-- Modal Reject pengajuan_pembelian -->
                                @foreach ($pengajuan_pembelians as $pengajuan_pembelian)
                                <div class="modal fade" id="rejectModal{{ $pengajuan_pembelian->id_pengajuanpembelian }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">

                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="rejectModalLabel">Reject Pengajuan Pembelian</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>

                                          <table class="table">
                                          <form action="{{route('pengajuanpembelian.reject', $pengajuan_pembelian->id_pengajuanpembelian)}}" method="POST">
                                          <tbody> 
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                              <div class="row">
                                                    <!-- Kolom pertama -->
                                                    <tr>
                                                      <td><b>No Polisi:</b></td>
                                                      <td><b>{{ $pengajuan_pembelian->id_pengajuanpembelian }}</b></td>
                                                      <td><b>Merk:</b></td> 
                                                      <td><b>{{ $pengajuan_pembelian->merk }}</b></td>
                                                    </tr>
                                                    <tr>
                                                      <td><b>Tipe:</b></td>
                                                      <td><b>{{ $pengajuan_pembelian->tipe }}</b></td>
                                                      <td><b>Warna:</b></td> 
                                                      <td><b>{{ $pengajuan_pembelian->warna }}</b></td>
                                                    </tr>
                                                    <tr>
                                                      <td><b>Tanggal Beli: {{ $pengajuan_pembelian->tanggal_beli }}</b></td>
                                                    </tr>
                                                    <!-- Kolom kedua -->
                                                    <tr>
                                                      <td colspan ="4"><h5><b>Data Kendaraan</b></h5></td>
                                                    <tr>
                                                      <td><b>Harga Off:</b></td>
                                                      <td><b>Rp.{{ $pengajuan_pembelian->harga }}</b></td>
                                                      <td><b>BBN:</b></td>
                                                      <td><b>Rp.{{ $pengajuan_pembelian->bbn }}</b></td>
                                                    </tr>
                                                    <tr>
                                                      <td><b>OTR:</b></td>
                                                      <td><b>Rp.{{ $pengajuan_pembelian->otr }}</b></td>
                                                      <td><b>Karoseri:</b></td>
                                                      <td><b>Rp.{{ $pengajuan_pembelian->karoseri }}</b></td>
                                                    </tr>
                                                    <tr>
                                                      <td><b>Total Pembelian:</b></td>
                                                      <td><b>Rp.{{ $pengajuan_pembelian->total }}</b></td>
                                                      <td><b>Tahun:</b></td>
                                                      <td><b>{{ $pengajuan_pembelian->tahun }}</b></td>
                                                    </tr>
                                                  
                                                    <!-- Tambahkan informasi detail lainnya sesuai kebutuhan -->
                                                </div>
                                              </div>
                                            <div class="row">
                                              <div class="form-group">
                                                <tr>
                                                  <td>
                                                <label for="keterangan">Keterangan:</label>
                                                <input type="text" class="form-control" name="keterangan" id="keterangan">
                                                <input type="text" class="form-control" name="approval" value="Reject" hidden>
                                                  </td>
                                                </tr>
                                              </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                               <td> 
                                                <button type="submit" class="btn btn-danger"><span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                                </span> Reject</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              </td>
                                            </div>
                                          </tbody>
                                          
                                        </form>
                                        </table>
                                      </div>
                                  </div>
                              </div>
                
                              
                           @endforeach 
                          
                          </tbody>
                          
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
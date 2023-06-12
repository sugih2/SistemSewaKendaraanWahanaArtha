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

          <!-- PTipe Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Approval Tambah kendaraan</h1>
          </div>

          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kendaraan</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Polisi</th>
                                  <th>Merk</th>
                                  <th>Tipe</th>
                                  <th>Jenis Kendaraan</th>
                                  <th>Lokasi</th>
                                  <th>Status</th>
                                  <th>Approval</th>
                                  <th colspan="3">Aksi</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>No Polisi</th>
                                  <th>Merk</th>
                                  <th>Tipe</th>
                                  <th>Jenis Kendaraan</th>
                                  <th>Lokasi</th>
                                  <th>Status</th>
                                  <th>Approval</th>
                                  <th colspan="3">Aksi</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($kendaraans as $kendaraan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kendaraan->no_polisi }}</td>
                                    <td>{{ $kendaraan->merk }}</td>
                                    <td>{{ $kendaraan->tipe }}</td>
                                    <td>{{ $kendaraan->jenis }}</td>
                                    <td>{{ $kendaraan->lokasi }}</td>
                                    <td>{{ $kendaraan->status }}</td>
                                    <td>{{ $kendaraan->approval }}</td>
                                    <td>
                                      <button class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{ $kendaraan->no_polisi }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Reject</span>
                                      </button>
                                    </td>
                                    <td>
                                      <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{ $kendaraan->no_polisi }}">
                                      <span class="icon text-white-50">
                                          <i class="fas fa-check"></i>
                                      </span>
                                      <span class="text">Setuju</span>
                                    </button>
                                    </td>
                                    <td>
                                      <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $kendaraan->no_polisi }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                      </button>
                                      {{-- <a href="{{ route('kendaraan.show', ['kendaraan' => $kendaraan->no_polisi]) }}" class="btn btn-info btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Detail</span>
                                      </a> --}}
                                    </td>
                                </tr>
                                <!-- Modal Detail Kendaraan -->
                                <div class="modal fade" id="detailModal{{ $kendaraan->no_polisi }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="detailModalLabel">Detail Kendaraan</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <!-- Kolom pertama -->
                                                  <p>No Polisi: {{ $kendaraan->no_polisi }}</p>
                                                  <p>Merk: {{ $kendaraan->merk }}</p>
                                                  <p>Tipe: {{ $kendaraan->tipe }}</p>
                                                  <p>Jenis: {{ $kendaraan->jenis }}</p>
                                                  <p>Kondisi: {{ $kendaraan->kondisi }}</p>
                                                  <p>No Rangka: {{ $kendaraan->no_rangka }}</p>
                                                  <p>No Mesin: {{ $kendaraan->no_mesin }}</p>
                                                  <p>Tahun Rakitan: {{ $kendaraan->tahun_rakitan }}</p>
                                                  <p>Warna: {{ $kendaraan->warna }}</p>
                                                  <p>Tanggal Beli: {{ $kendaraan->tanggal_beli }}</p>
                                              </div>
                                              <div class="col-md-6">
                                                  <!-- Kolom kedua -->
                                                  <p>Harga Off: {{ $kendaraan->harga_off }}</p>
                                                  <p>BBN: {{ $kendaraan->bbn }}</p>
                                                  <p>Karoseri: {{ $kendaraan->karoseri }}</p>
                                                  <p>Total Pembelian: {{ $kendaraan->total }}</p>
                                                  <p>Tahun: {{ $kendaraan->tahun }}</p>
                                                  <p>Rate: {{ $kendaraan->rate }}</p>
                                                  <p>Lokasi: {{ $kendaraan->lokasi }}</p>
                                                  <p>Status: {{ $kendaraan->status }}</p>
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

                                <!-- Modal Approve Kendaraan -->
                                <div class="modal fade" id="approveModal{{ $kendaraan->no_polisi }}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="approveModalLabel">Approve Kendaraan</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <form action="{{ route('kendaraan.approved', $kendaraan->no_polisi) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Kolom pertama -->
                                                    <p>No Polisi: {{ $kendaraan->no_polisi }}</p>
                                                    <p>Merk: {{ $kendaraan->merk }}</p>
                                                    <p>Tipe: {{ $kendaraan->tipe }}</p>
                                                    <p>Jenis: {{ $kendaraan->jenis }}</p>
                                                    <p>Kondisi: {{ $kendaraan->kondisi }}</p>
                                                    <p>No Rangka: {{ $kendaraan->no_rangka }}</p>
                                                    <p>No Mesin: {{ $kendaraan->no_mesin }}</p>
                                                    <p>Tahun Rakitan: {{ $kendaraan->tahun_rakitan }}</p>
                                                    <p>Warna: {{ $kendaraan->warna }}</p>
                                                    <p>Tanggal Beli: {{ $kendaraan->tanggal_beli }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Kolom kedua -->
                                                    <p>Harga Off: {{ $kendaraan->harga_off }}</p>
                                                    <p>BBN: {{ $kendaraan->bbn }}</p>
                                                    <p>Karoseri: {{ $kendaraan->karoseri }}</p>
                                                    <p>Total Pembelian: {{ $kendaraan->total }}</p>
                                                    <p>Tahun: {{ $kendaraan->tahun }}</p>
                                                    <p>Rate: {{ $kendaraan->rate }}</p>
                                                    <p>Lokasi: {{ $kendaraan->lokasi }}</p>
                                                    <p>Status: {{ $kendaraan->status }}</p>
                                                    <!-- Tambahkan informasi detail lainnya sesuai kebutuhan -->
                                                </div>
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

                                <!-- Modal Reject Kendaraan -->
                                <div class="modal fade" id="rejectModal{{ $kendaraan->no_polisi }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="rejectModalLabel">Reject Kendaraan</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <form action="{{ route('kendaraan.reject', $kendaraan->no_polisi) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Kolom pertama -->
                                                    <p>No Polisi: {{ $kendaraan->no_polisi }}</p>
                                                    <p>Merk: {{ $kendaraan->merk }}</p>
                                                    <p>Tipe: {{ $kendaraan->tipe }}</p>
                                                    <p>Jenis: {{ $kendaraan->jenis }}</p>
                                                    <p>Kondisi: {{ $kendaraan->kondisi }}</p>
                                                    <p>No Rangka: {{ $kendaraan->no_rangka }}</p>
                                                    <p>No Mesin: {{ $kendaraan->no_mesin }}</p>
                                                    <p>Tahun Rakitan: {{ $kendaraan->tahun_rakitan }}</p>
                                                    <p>Warna: {{ $kendaraan->warna }}</p>
                                                    <p>Tanggal Beli: {{ $kendaraan->tanggal_beli }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Kolom kedua -->
                                                    <p>Harga Off: {{ $kendaraan->harga_off }}</p>
                                                    <p>BBN: {{ $kendaraan->bbn }}</p>
                                                    <p>Karoseri: {{ $kendaraan->karoseri }}</p>
                                                    <p>Total Pembelian: {{ $kendaraan->total }}</p>
                                                    <p>Tahun: {{ $kendaraan->tahun }}</p>
                                                    <p>Rate: {{ $kendaraan->rate }}</p>
                                                    <p>Lokasi: {{ $kendaraan->lokasi }}</p>
                                                    <p>Status: {{ $kendaraan->status }}</p>
                                                    <!-- Tambahkan informasi detail lainnya sesuai kebutuhan -->
                                                </div>
                                                <div class="form-group">
                                                  <label for="keterangan">Keterangan:</label>
                                                  <input type="text" class="form-control" name="keterangan" id="keterangan">
                                                  <input type="text" class="form-control" name="approval" value="Reject" hidden>
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
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

          <!-- PTipe Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Revisi Data pengajuan_pembelian Sewa</h1>
          </div>

          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data pengajuan_pembelian</h6>
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
                                  <th>Keterangan</th>
                                  <th colspan="2">Aksi</th>
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
                                  <th>Keterangan</th>
                                  <th colspan="2">Aksi</th>
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
                                    <td>{{ $pengajuan_pembelian->keterangan }}</td>
                                    <td>
                                      <a href="{{route('pengajuanpembelian.edit', $pengajuan_pembelian->id_pengajuanpembelian)}}" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Revisi</span>
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
                      <!-- Modal Detail pengajuan_pembelian -->
                    @foreach ($pengajuan_pembelians as $pengajuan_pembelian)
                    <div class="modal fade" id="detailModal{{ $pengajuan_pembelian->_pengajuanpembelian }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="detailModalLabel">Detail pengajuan_pembelian</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td colspan="4"><h5><b>Data pengajuan_pembelian</b></h5></td>
                                  </tr>
                                  <tr>
                                    <td><b>No Polisi</b></td>
                                    <td><b>{{ $pengajuan_pembelian->id_pengajuanpembelian }}</b></td>
                                    <td><b>Merk</b></td>
                                    <td>{{ $pengajuan_pembelian->merk }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Keterangan</b></td>
                                    <td colspan="3">{{$pengajuan_pembelian->keterangan}}</td>
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
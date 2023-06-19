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
            <h1 class="h3 mb-0 text-gray-800">Revisi Data Kendaraan Sewa</h1>
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
                                  <th>Keterangan</th>
                                  <th colspan="2">Aksi</th>
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
                                  <th>Keterangan</th>
                                  <th colspan="2">Aksi</th>
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
                                    <td>{{ $kendaraan->keterangan }}</td>
                                    <td>
                                      <a href="{{route('kendaraan.edit', $kendaraan->no_polisi)}}" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Revisi</span>
                                      </a>
                                    </td>
                                    <td>
                                      <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $kendaraan->no_polisi }}">
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
                      <!-- Modal Detail Kendaraan -->
                    @foreach ($kendaraans as $kendaraan)
                    <div class="modal fade" id="detailModal{{ $kendaraan->no_polisi }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="detailModalLabel">Detail Kendaraan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <td colspan="4"><h5><b>Data Kendaraan</b></h5></td>
                                  </tr>
                                  <tr>
                                    <td><b>No Polisi</b></td>
                                    <td><b>{{ $kendaraan->no_polisi }}</b></td>
                                    <td><b>Merk</b></td>
                                    <td>{{ $kendaraan->merk }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Tipe</b></td>
                                    <td>{{ $kendaraan->tipe }}</td>
                                    <td><b>Jenis</b></td>
                                    <td>{{ $kendaraan->jenis }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Kondisi</b></td>
                                    <td>{{ $kendaraan->kondisi }}</td>
                                    <td><b>No Rangka</b></td>
                                    <td>{{ $kendaraan->no_rangka }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>No Mesin</b></td>
                                    <td>{{ $kendaraan->no_mesin }}</td>
                                    <td><b>Tahun Rakitan</b></td>
                                    <td>{{ $kendaraan->tahun_rakitan }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Warna</b></td>
                                    <td>{{ $kendaraan->warna }}</td>
                                    <td><b>Tahun</b></td>
                                    <td>{{ $kendaraan->tahun }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Rate</b></td>
                                    <td>{{ $kendaraan->rate }}</td>
                                    <td><b>Lokasi</b></td>
                                    <td>{{ $kendaraan->lokasi }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Status</b></td>
                                    <td>{{ $kendaraan->status }}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4"><h5><b>Data Pembelian</b></h5></td>
                                  </tr>
                                  <tr>
                                    <td><b>Tanggal Beli</b></td>
                                    <td>{{ $kendaraan->tanggal_beli }}</td>
                                    <td><b>Harga Off</b></td>
                                    <td>{{ $kendaraan->harga_off }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>BBN</b></td>
                                    <td>{{ $kendaraan->bbn }}</td>
                                    <td><b>Karoseri</b></td>
                                    <td>{{ $kendaraan->karoseri }}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Total Pembelian</b></td>
                                    <td>{{ $kendaraan->total }}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4"><h5><b>Data BPKB</b></h5></td>
                                  </tr>
                                  <tr>
                                    <td><b>Nama Pemegang</b></td>
                                    <td>{{$kendaraan->bpkb->nama_bpkb}}</td>
                                    <td><b>Posisi</b></td>
                                    <td>{{$kendaraan->bpkb->posisi_bpkb}}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4"><h5><b>Data STNK</b></h5></td>
                                  </tr>
                                  <tr>
                                    <td><b>Tanggal Jatuh Tempo</b></td>
                                    <td>{{$kendaraan->stnk->tanggal_jt_stnk}}</td>
                                    <td><b>Tanggal Bayar</b></td>
                                    <td>{{$kendaraan->stnk->tanggal_bayar_stnk}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Biaya</b></td>
                                    <td>{{$kendaraan->stnk->biaya_stnk}}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4"><h5><b>Data KIR</b></h5></td>
                                  </tr>
                                  <tr>
                                    <td><b>Tanggal Jatuh Tempo</b></td>
                                    <td>{{$kendaraan->kir->tanggal_jt_kir}}</td>
                                    <td><b>Tanggal Bayar</b></td>
                                    <td>{{$kendaraan->kir->tanggal_bayar_kir}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Biaya</b></td>
                                    <td>{{$kendaraan->kir->biaya_kir}}</td>
                                  </tr>
                                  <tr>
                                    <td><b>Keterangan</b></td>
                                    <td colspan="3">{{$kendaraan->keterangan}}</td>
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
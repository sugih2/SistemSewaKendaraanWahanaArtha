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
              <h6 class="m-0 font-weight-bold text-primary">Approval Serah Terima Dealer to Wahana</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>ID Serah Terima</th>
                            <th>No Polisi</th>
                            <th colspan="3">Aksi</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>ID Serah Terima</th>
                              <th>No Polisi</th>
                              <th colspan="3">Aksi</th>
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($proses_stdealertowahanas as $proses_stdealertowahana)
                          <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$proses_stdealertowahana->id_stdealertowahana}}</td>
                              <td>{{$proses_stdealertowahana->no_polisi}}</td>
                              <td>
                                <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{ $proses_stdealertowahana->no_polisi }}">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-flag"></i>
                                  </span>
                                  <span class="text">Reject</span>
                                </button>
                              </td>
                              <td>
                                <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{ $proses_stdealertowahana->no_polisi }}">
                                  <span class="icon text-white-50">
                                      <i class="fas fa-thumbs-up"></i>
                                  </span>
                                  <span class="text">Setuju</span>
                              </button>
                              </td>
                              <td>
                                <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $proses_stdealertowahana->no_polisi }}">
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
                  @foreach ($proses_stdealertowahanas as $proses_stdealertowahana)
                        <!-- Modal Detail pengajuan_pembelian -->
                        <div class="modal fade" id="detailModal{{ $proses_stdealertowahana->no_polisi }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                              <h4 class="modal-title" id="detailModalLabel">Detail Serah Terima Kendaraan Dealer to Wahana</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                              <div class="row">
                                  <table class="table">
                                  <tbody>
                                      <tr>
                                      <td><b>ID Serah Terima</b></td>
                                      <td colspan="2"><b>{{ $proses_stdealertowahana->id_stdealertowahana }}</b></td>
                                      <td><b>No Polisi</b></td>
                                      <td colspan="2"><b>{{ $proses_stdealertowahana->no_polisi }}</b></td>
                                      </tr>
                                      <tr>
                                      <td colspan="6"><h5><b>Data Kendaraan</b></h5></td>
                                      </tr>
                                      @foreach ($kendaraans as $kendaraan)
                                      @if ($kendaraan->no_polisi == $proses_stdealertowahana->no_polisi)
                                        <tr>
                                            <td><b>Kategori Kendaraan</b></td>
                                            <td colspan="5">{{ $kendaraan->kategori }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Merk</b></td>
                                            <td colspan="2">{{ $kendaraan->merk }}</td>
                                            <td><b>No Polisi</b></td>
                                            <td colspan="2">{{ $kendaraan->no_polisi }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tipe</b></td>
                                            <td colspan="2">{{ $kendaraan->tipe }}</td>
                                            <td><b>No Rangka</b></td>
                                            <td colspan="2">{{ $kendaraan->no_rangka }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tahun</b></td>
                                            <td colspan="2">{{ $kendaraan->tahun }}</td>
                                            <td><b>No Mesin</b></td>
                                            <td colspan="2">{{ $kendaraan->no_mesin }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Warna</b></td>
                                            <td colspan="2">{{ $kendaraan->warna }}</td>
                                            <td><b>Lokasi</b></td>
                                            <td colspan="2">{{ $kendaraan->lokasi }}</td>
                                        </tr>
                                      @endif
                                      @endforeach
                                      <tr>
                                      <td colspan="6"><h5><b>Data Surat - Surat Kendaraan</b></h5></td>
                                      </tr>
                                      @foreach ($stnks as $stnk)
                                      @if ($stnk->no_polisi == $proses_stdealertowahana->no_polisi)
                                      <tr>
                                      <td><b>Tanggal Jatuh Tempo STNK</b></td>
                                      <td>{{ $stnk->tanggal_jt_stnk }}</td>
                                      <td><b>Tanggal Bayar STNK</b></td>
                                      <td>{{ $stnk->tanggal_bayar_stnk }}</td>
                                      <td><b>Biaya STNK</b></td>
                                      <td>{{ $stnk->biaya_stnk }}</td>
                                      </tr>
                                      @endif
                                      @endforeach
                                      @foreach ($kirs as $kir)
                                      @if ($kir->no_polisi == $proses_stdealertowahana->no_polisi)
                                      <tr>
                                      <td><b>Tanggal Jatuh Tempo KIR</b></td>
                                      <td>{{ $kir->tanggal_jt_kir }}</td>
                                      <td><b>Tanggal Bayar KIR</b></td>
                                      <td>{{ $kir->tanggal_bayar_kir }}</td>
                                      <td><b>Biaya KIR</b></td>
                                      <td>{{ $kir->biaya_kir }}</td>
                                      </tr>
                                      @endif
                                      @endforeach
                                      <tr>
                                      <td colspan="6"><h5><b>Data Berita Serah Terima Kendaraan Dealer to Wahana</b></h5></td>
                                      </tr>
                                      <tr>
                                      <td><b>Tanggal Serah Terima</b></td>
                                      <td colspan="5">{{ $proses_stdealertowahana->tgl_st }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Nama yang menyerahkan</b></td>
                                      <td colspan="2">{{ $proses_stdealertowahana->nama_penyerah }}</td>
                                      <td><b>Nama yang menerima</b></td>
                                      <td colspan="2">{{ $proses_stdealertowahana->nama_penerima }}</td>
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
                    <div class="modal fade" id="approveModal{{ $proses_stdealertowahana->no_polisi }}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="approveModalLabel">Approve Serah Terima Kendaraan Dealer to Wahana</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('stdealertowahana.approved', ['no_polisi' => $proses_stdealertowahana->no_polisi])}}" method="POST">
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
                    <div class="modal fade" id="rejectModal{{ $proses_stdealertowahana->no_polisi }}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="rejectModalLabel">Reject Serah Terima Kendaraan Dealer to Wahana</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('stdealertowahana.reject', ['no_polisi' => $proses_stdealertowahana->no_polisi])}}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                    <div class="row">
                                      <table class="table">
                                      <tbody>
                                        <tr>
                                            <td><b>ID Serah Terima</b></td>
                                            <td colspan="2"><b>{{ $proses_stdealertowahana->id_stdealertowahana }}</b></td>
                                            <td><b>No Polisi</b></td>
                                            <td colspan="2"><b>{{ $proses_stdealertowahana->no_polisi }}</b></td>
                                            </tr>
                                            <tr>
                                            <td colspan="6"><h5><b>Data Kendaraan</b></h5></td>
                                            </tr>
                                            @foreach ($kendaraans as $kendaraan)
                                            @if ($kendaraan->no_polisi == $proses_stdealertowahana->no_polisi)
                                              <tr>
                                                  <td><b>Kategori Kendaraan</b></td>
                                                  <td colspan="5">{{ $kendaraan->kategori }}</td>
                                              </tr>
                                              <tr>
                                                  <td><b>Merk</b></td>
                                                  <td colspan="2">{{ $kendaraan->merk }}</td>
                                                  <td><b>No Polisi</b></td>
                                                  <td colspan="2">{{ $kendaraan->no_polisi }}</td>
                                              </tr>
                                              <tr>
                                                  <td><b>Tipe</b></td>
                                                  <td colspan="2">{{ $kendaraan->tipe }}</td>
                                                  <td><b>No Rangka</b></td>
                                                  <td colspan="2">{{ $kendaraan->no_rangka }}</td>
                                              </tr>
                                              <tr>
                                                  <td><b>Tahun</b></td>
                                                  <td colspan="2">{{ $kendaraan->tahun }}</td>
                                                  <td><b>No Mesin</b></td>
                                                  <td colspan="2">{{ $kendaraan->no_mesin }}</td>
                                              </tr>
                                              <tr>
                                                  <td><b>Warna</b></td>
                                                  <td colspan="2">{{ $kendaraan->warna }}</td>
                                                  <td><b>Lokasi</b></td>
                                                  <td colspan="2">{{ $kendaraan->lokasi }}</td>
                                              </tr>
                                            @endif
                                            @endforeach
                                            <tr>
                                            <td colspan="6"><h5><b>Data Surat - Surat Kendaraan</b></h5></td>
                                            </tr>
                                            @foreach ($stnks as $stnk)
                                            @if ($stnk->no_polisi == $proses_stdealertowahana->no_polisi)
                                            <tr>
                                            <td><b>Tanggal Jatuh Tempo STNK</b></td>
                                            <td>{{ $stnk->tanggal_jt_stnk }}</td>
                                            <td><b>Tanggal Bayar STNK</b></td>
                                            <td>{{ $stnk->tanggal_bayar_stnk }}</td>
                                            <td><b>Biaya STNK</b></td>
                                            <td>{{ $stnk->biaya_stnk }}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @foreach ($kirs as $kir)
                                            @if ($kir->no_polisi == $proses_stdealertowahana->no_polisi)
                                            <tr>
                                            <td><b>Tanggal Jatuh Tempo KIR</b></td>
                                            <td>{{ $kir->tanggal_jt_kir }}</td>
                                            <td><b>Tanggal Bayar KIR</b></td>
                                            <td>{{ $kir->tanggal_bayar_kir }}</td>
                                            <td><b>Biaya KIR</b></td>
                                            <td>{{ $kir->biaya_kir }}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            <tr>
                                            <td colspan="6"><h5><b>Data Berita Serah Terima Kendaraan Dealer to Wahana</b></h5></td>
                                            </tr>
                                            <tr>
                                            <td><b>Tanggal Serah Terima</b></td>
                                            <td colspan="5">{{ $proses_stdealertowahana->tgl_st }}</td>
                                            </tr>
                                            <tr>
                                            <td><b>Nama yang menyerahkan</b></td>
                                            <td colspan="2">{{ $proses_stdealertowahana->nama_penyerah }}</td>
                                            <td><b>Nama yang menerima</b></td>
                                            <td colspan="2">{{ $proses_stdealertowahana->nama_penerima }}</td>
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
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
            <h1 class="h3 mb-0 text-gray-800 mr-auto">Kontrak Sewa</h1>
            <div>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
              </a>
            </div>
          </div>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kontrak Sewa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>ID Kontrak Sewa</th>
                              <th>Tanggal Sewa</th>
                              <th>Tanggal Awal</th>
                              <th>Tanggal Akhir</th>
                              <th>Biaya Sewa</th>
                              <th>No Polisi</th>
                              <th>ID Penyewa</th>
                              <th>ID Pemakai</th>
                              <th>Status</th>
                              <th>Approval</th>
                              <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID Kontrak Sewa</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Biaya Sewa</th>
                                <th>No Polisi</th>
                                <th>ID Penyewa</th>
                                <th>ID Pemakai</th>
                                <th>Status</th>
                                <th>Approval</th>
                                <th>Keterangan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($kontrak_sewas as $kontrak_sewa)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$kontrak_sewa->id_kontraksewa}}</td>
                                  <td>{{$kontrak_sewa->tgl_sewa}}</td>
                                  <td>{{$kontrak_sewa->tgl_awal}}</td>
                                  <td>{{$kontrak_sewa->tgl_akhir}}</td>
                                  <td>{{$kontrak_sewa->biaya_sewa}}</td>
                                  <td>{{$kontrak_sewa->no_polisi}}</td>
                                  <td>{{$kontrak_sewa->id_penyewa}}</td>
                                  <td>{{$kontrak_sewa->id_pemakai}}</td>
                                  <td>{{$kontrak_sewa->status}}</td>
                                  <td>{{$kontrak_sewa->approval}}</td>
                                  <td>{{$kontrak_sewa->keterangan}}</td>
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
              <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Approval Kontrak Sewa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Kontrak Sewa</th>
                                    <th colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID Kontrak Sewa</th>
                                    <th colspan="3">Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                              @foreach ($proses_kontrak_sewas as $proses_kontrak_sewa)
                                
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $proses_kontrak_sewa->id_kontraksewa }}</td>
                                    <td>
                                      <button class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#rejectModal{{ $proses_kontrak_sewa->id_kontraksewa }}">
                                          <span class="icon text-white-50">
                                              <i class="fas fa-flag"></i>
                                          </span>
                                          <span class="text">Reject</span>
                                      </button>
                                  </td>
                                  <td>
                                  <button class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#approveModal{{ $proses_kontrak_sewa->id_kontraksewa }}">
                                      <span class="icon text-white-50">
                                          <i class="fas fa-check-square"></i>
                                      </span>
                                      <span class="text">Approve</span>
                                  </button>
                                  
                                  </td>
                                  <td>
                                      <button class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#detailModal{{ $proses_kontrak_sewa->id_kontraksewa }}">
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
                        @foreach ($proses_kontrak_sewas as $proses_kontrak_sewa)
                        <!-- Modal Approve pengajuan_pembelian -->
                        <div class="modal fade" id="approveModal{{ $proses_kontrak_sewa->id_kontraksewa}}" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="approveModalLabel">Approve Pengajuan Pembelian</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('kontraksewa.approved', $proses_kontrak_sewa->id_kontraksewa)}}" method="POST">
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
                        <div class="modal fade" id="rejectModal{{ $proses_kontrak_sewa->id_kontraksewa}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel">Reject Pengajuan Pembelian</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('kontraksewa.reject', $proses_kontrak_sewa->id_kontraksewa)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <div class="modal-body">
                                        <div class="row">
                                            <table class="table">
                                            <tbody>
                                              <tr>
                                                <td colspan="2"><b>ID Kontrak Sewa</b></td>
                                                <td colspan="4"><b>{{ $proses_kontrak_sewa->id_kontraksewa }}</b></td>
                                                </tr>
                                                <tr>
                                                <td colspan="6"><h5><b>Data Penyewa</b></h5></td>
                                                </tr>
                                                @foreach ($penyewas as $penyewa)
                                                  @if ($penyewa->id_penyewa == $proses_kontrak_sewa->id_penyewa)
                                                      <tr>
                                                          <td><b>Nama PT</b></td>
                                                          <td>{{ $penyewa->nama_pt }}</td>
                                                          <td><b>Nama Cabang</b></td>
                                                          <td>{{ $penyewa->nama_cabang }}</td>
                                                      </tr>
                                                      <tr>
                                                          <td><b>Alamat</b></td>
                                                          <td>{{ $penyewa->alamat }}</td>
                                                      </tr>
                                                  @endif
                                                @endforeach
                                                <tr>
                                                <td colspan="6"><h5><b>Data Pemakai</b></h5></td>
                                                </tr>
                                                <tr>
                                                @foreach ($pemakais as $pemakai)
                                                  @if ($pemakai->id_pemakai == $proses_kontrak_sewa->id_pemakai)
                                                      <tr>
                                                          <td><b>Nama</b></td>
                                                          <td>{{ $pemakai->nama }}</td>
                                                          <td><b>Jabatan</b></td>
                                                          <td>{{ $pemakai->jabatan }}</td>
                                                      </tr>
                                                      <tr>
                                                          <td><b>No HP</b></td>
                                                          <td>{{ $pemakai->no_hp }}</td>
                                                      </tr>
                                                  @endif
                                                @endforeach
                                                <tr>
                                                <td colspan="6"><h5><b>Data Kendaraan</b></h5></td>
                                                </tr>
                                                @foreach ($kendaraans as $kendaraan)
                                                @if ($kendaraan->no_polisi == $proses_kontrak_sewa->no_polisi)
                                                <tr>
                                                <td><b>No Polisi</b></td>
                                                <td>{{ $kendaraan->no_polisi }}</td>
                                                </tr>
                                                <tr>
                                                <td><b>Kategori</b></td>
                                                <td>{{ $kendaraan->kategori }}</td>
                                                <td><b>No Rangka</b></td>
                                                <td>{{ $kendaraan->no_rangka }}</td>
                                                </tr>
                                                <tr>
                                                <td><b>Merk</b></td>
                                                <td>{{ $kendaraan->merk }}</td>
                                                <td><b>No Mesin</b></td>
                                                <td>{{ $kendaraan->no_mesin }}</td>
                                                </tr>
                                                <tr>
                                                <td><b>Tipe</b></td>
                                                <td>{{ $kendaraan->tipe }}</td>
                                                <td><b>Lokasi</b></td>
                                                <td>{{ $kendaraan->lokasi }}</td>
                                                </tr>
                                                <tr>
                                                <td><b>Tahun</b></td>
                                                <td>{{ $kendaraan->tahun }}</td>
                                                <td><b>Total</b></td>
                                                <td>{{ $kendaraan->tahun }}</td>
                                                </tr>
                                                <tr>
                                                <td><b>Warna</b></td>
                                                <td>{{ $kendaraan->warna }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                <tr>
                                                <td colspan="6"><h5><b>Data Sewa</b></h5></td>
                                                </tr>
                                                <tr>
                                                <td><b>Tanggal Sewa</b></td>
                                                <td>{{ $proses_kontrak_sewa->tgl_sewa }}</td>
                                                </tr>
                                                <tr>
                                                <td><b>Periode Sewa</b></td>
                                                <td>{{ $proses_kontrak_sewa->tgl_awal }} s/d {{ $proses_kontrak_sewa->tgl_akhir }}</td>
                                                <td><b>Biaya Sewa</b></td>
                                                <td>{{ $proses_kontrak_sewa->biaya_sewa }}</td>
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
                        <div class="modal fade" id="detailModal{{ $proses_kontrak_sewa->id_kontraksewa }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="detailModalLabel">Detail Kontrak Sewa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <div class="row">
                                    <table class="table">
                                    <tbody>
                                      <tr>
                                        <td colspan="2"><b>ID Kontrak Sewa</b></td>
                                        <td colspan="4"><b>{{ $proses_kontrak_sewa->id_kontraksewa }}</b></td>
                                        </tr>
                                        <tr>
                                        <td colspan="6"><h5><b>Data Penyewa</b></h5></td>
                                        </tr>
                                        @foreach ($penyewas as $penyewa)
                                          @if ($penyewa->id_penyewa == $proses_kontrak_sewa->id_penyewa)
                                              <tr>
                                                  <td><b>Nama PT</b></td>
                                                  <td>{{ $penyewa->nama_pt }}</td>
                                                  <td><b>Nama Cabang</b></td>
                                                  <td>{{ $penyewa->nama_cabang }}</td>
                                              </tr>
                                              <tr>
                                                  <td><b>Alamat</b></td>
                                                  <td>{{ $penyewa->alamat }}</td>
                                              </tr>
                                          @endif
                                        @endforeach
                                        <tr>
                                        <td colspan="6"><h5><b>Data Pemakai</b></h5></td>
                                        </tr>
                                        <tr>
                                        @foreach ($pemakais as $pemakai)
                                          @if ($pemakai->id_pemakai == $proses_kontrak_sewa->id_pemakai)
                                              <tr>
                                                  <td><b>Nama</b></td>
                                                  <td>{{ $pemakai->nama }}</td>
                                                  <td><b>Jabatan</b></td>
                                                  <td>{{ $pemakai->jabatan }}</td>
                                              </tr>
                                              <tr>
                                                  <td><b>No HP</b></td>
                                                  <td>{{ $pemakai->no_hp }}</td>
                                              </tr>
                                          @endif
                                        @endforeach
                                        <tr>
                                        <td colspan="6"><h5><b>Data Kendaraan</b></h5></td>
                                        </tr>
                                        @foreach ($kendaraans as $kendaraan)
                                        @if ($kendaraan->no_polisi == $proses_kontrak_sewa->no_polisi)
                                        <tr>
                                        <td><b>No Polisi</b></td>
                                        <td>{{ $kendaraan->no_polisi }}</td>
                                        </tr>
                                        <tr>
                                        <td><b>Kategori</b></td>
                                        <td>{{ $kendaraan->kategori }}</td>
                                        <td><b>No Rangka</b></td>
                                        <td>{{ $kendaraan->no_rangka }}</td>
                                        </tr>
                                        <tr>
                                        <td><b>Merk</b></td>
                                        <td>{{ $kendaraan->merk }}</td>
                                        <td><b>No Mesin</b></td>
                                        <td>{{ $kendaraan->no_mesin }}</td>
                                        </tr>
                                        <tr>
                                        <td><b>Tipe</b></td>
                                        <td>{{ $kendaraan->tipe }}</td>
                                        <td><b>Lokasi</b></td>
                                        <td>{{ $kendaraan->lokasi }}</td>
                                        </tr>
                                        <tr>
                                        <td><b>Tahun</b></td>
                                        <td>{{ $kendaraan->tahun }}</td>
                                        <td><b>Total</b></td>
                                        <td>{{ $kendaraan->tahun }}</td>
                                        </tr>
                                        <tr>
                                        <td><b>Warna</b></td>
                                        <td>{{ $kendaraan->warna }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        <tr>
                                        <td colspan="6"><h5><b>Data Sewa</b></h5></td>
                                        </tr>
                                        <tr>
                                        <td><b>Tanggal Sewa</b></td>
                                        <td>{{ $proses_kontrak_sewa->tgl_sewa }}</td>
                                        </tr>
                                        <tr>
                                        <td><b>Periode Sewa</b></td>
                                        <td>{{ $proses_kontrak_sewa->tgl_awal }} s/d {{ $proses_kontrak_sewa->tgl_akhir }}</td>
                                        <td><b>Biaya Sewa</b></td>
                                        <td>{{ $proses_kontrak_sewa->biaya_sewa }}</td>
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
    $('#dataTable').DataTable();
  } );
  </script>
</body>

</html>
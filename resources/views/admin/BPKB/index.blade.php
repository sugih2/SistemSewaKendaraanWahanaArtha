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
            <h1 class="h3 mb-0 text-gray-800">Kelola BPKB</h1>
            <a href={{ route('bpkb.create') }} class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Update Data BPKB</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Buku Kepemilikan Kendaraan Bermotor (BPKB)</h6>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>No Polisi</th>
                                  <th>Nama</th>
                                  <th>Posisi</th>
                                  <th>Approval</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>No</th>
                                  <th>No Polisi</th>
                                  <th>Nama</th>
                                  <th>Posisi</th>
                                  <th>Approval</th>

                              </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($bpkbs as $bpkb)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bpkb->no_polisi }}</td>
                                    <td>{{ $bpkb->nama_bpkb }}</td>
                                    <td>{{ $bpkb->posisi_bpkb }}</td>
                                    <td>{{ $bpkb->approval }}</td>
                              
                                </tr>
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
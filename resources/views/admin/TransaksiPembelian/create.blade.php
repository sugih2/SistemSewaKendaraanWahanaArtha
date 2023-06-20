<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('layout.admin_sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi Pembelian Kendaraan</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            @if ($errors->any())
        <div class="allert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <form method="post" action="{{ route('pengajuanpembelian.store') }}" class="container-fluid">
        @csrf
        <b>
        <h4 class="h4 mb-10 text-gray-800">1. Direksi</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Data SPPK</label>
              <input type="text" class="form-control" name="id_sppk">
            </div>
            <div class="col-sm-4">
              <label for="">Data Surat Pengajuan</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">ID Transaksi</label>
              <input type="text" class="form-control" name="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tanggal Transaksi Pembelian</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">Biaya Transaksi Pembelian</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">Bukti Transaksi</label>
              <input type="text" class="form-control" name="">
            </div>
        </div>
        <input type="text" class="form-control" name="approval" value="Proses Approval" hidden>
        <div class="form-group row col-sm-6 mb-3 mb-sm-0">
            <input type="submit" class="btn btn-lg btn-primary shadow-sm" value="Submit">
        </div>
        
    </b>    
      </form>
            
          </div>
            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  @include('layout.footer')


</body>

</html>
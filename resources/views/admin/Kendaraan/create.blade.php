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
            <h1 class="h3 mb-0 text-gray-800">Data Kendaraan Sewa</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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

    <form method="POST" action="{{ route('kendaraan.store') }}">
        @csrf
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Jenis Kendaraan</label>
            <input type="text" class="form-control" name="">
          </div>
          <div class="col-sm-6">
            <label for="">No Polisi</label>
            <input type="text" class="form-control" name="">
          </div>
          
        </div>

        <div class="form-group row">
          <label for="">Merk</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
            <label for="">No Rangka</label>
            <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Tipe</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">No Mesin</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Tahun Rakitan</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Lokasi Kendaraan</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Warna</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Status</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Tanggal Pembelian</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Karoseri</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Harga Off</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Total Pembelian</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">BBN</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
          <label for="">Status</label>
          <input type="text" class="form-control" name="">
        </div>
        <div class="form-group row">
            <input type="submit" class="btn btn-success" value="Submit">
        </div>
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
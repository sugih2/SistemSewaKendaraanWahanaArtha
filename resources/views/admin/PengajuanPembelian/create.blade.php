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
            <h1 class="h3 mb-0 text-gray-800">Pengajuan Pembelian Kendaraan</h1>
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
        <h4 class="h4 mb-10 text-gray-800">1. SPPK</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nama PT</label>
              <input type="text" class="form-control" name="id_sppk">
            </div>
            <div class="col-sm-4">
              <label for="">Cabang</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" name="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">JW Sewa</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">Biaya Sewa</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">% Biaya Sewa</label>
              <input type="text" class="form-control" name="">
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">2. Surat Penawaran Harga Kendaraan</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Dealer</label>
              <input type="text" class="form-control" name="nama_p_dealer">
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" name="tanggal_p_dealer">
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control" name="harga_p_dealer">
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">3. Surat Penawaran Karoseri</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nama PT</label>
              <input type="text" class="form-control" name="nama_pt_karoseri">
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" name="tanggal_p_karoseri">
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control" name="harga_p_karoseri">
            </div>
        </div>
        <br>
        <h6 class="h5 mb-10 text-gray-800">Sehubungan dengan hal tersebut di atas, dengan ini kami ajukan pembelian Kendaraan Baru sebagai berikut :</h6>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Dealer</label>
              <input type="text" class="form-control" name="dealer">
            </div>
            <div class="col-sm-4">
              <label for="">Dealer</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control" name="harga">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Merk</label>
              <input type="text" class="form-control" name="merk">
            </div>
            <div class="col-sm-4">
              <label for="">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi">
            </div>
            <div class="col-sm-4">
              <label for="">BBN</label>
              <input type="text" class="form-control" name="bbn">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tipe</label>
              <input type="text" class="form-control" name="tipe">
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">OTR</label>
              <input type="text" class="form-control" name="otr">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tahun</label>
              <input type="text" class="form-control" name="tahun">
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">Karoseri</label>
              <input type="text" class="form-control" name="karoseri">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Warna</label>
              <input type="text" class="form-control" name="warna">
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">Total</label>
              <input type="text" class="form-control" name="total">
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
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
              <input type="text" class="form-control @error('nama_p_dealer') is-invalid @enderror" name="id_sppk" value="{{ old('id_sppk') }}" required autocomplete="id_sppk" autofocus>
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
              <input type="text" class="form-control @error('nama_p_dealer') is-invalid @enderror" name="nama_p_dealer" value="{{ old('nama_p_dealer') }}" required autocomplete="nama_p_dealer" autofocus>
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control @error('tanggal_p_dealer') is-invalid @enderror" name="tanggal_p_dealer" value="{{ old('tanggal_p_dealer') }}" required autocomplete="tanggal_p_dealer" autofocus>
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control @error('harga_p_dealer') is-invalid @enderror" name="harga_p_dealer" value="{{ old('harga_p_dealer') }}" required autocomplete="harga_p_dealer" autofocus>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">3. Surat Penawaran Karoseri</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nama PT</label>
              <input type="text" class="form-control @error('nama_pt_karoseri') is-invalid @enderror" name="nama_pt_karoseri" value="{{ old('nama_pt_karoseri') }}" required autocomplete="nama_pt_karoseri" autofocus>
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control @error('tanggal_p_karoseri') is-invalid @enderror" name="tanggal_p_karoseri" value="{{ old('tanggal_p_karoseri') }}" required autocomplete="tanggal_p_karoseri" autofocus>
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control @error('harga_p_karoseri') is-invalid @enderror" name="harga_p_karoseri" value="{{ old('harga_p_karoseri') }}" required autocomplete="harga_p_karoseri" autofocus>
            </div>
        </div>
        <br>
        <h6 class="h5 mb-10 text-gray-800">Sehubungan dengan hal tersebut di atas, dengan ini kami ajukan pembelian Kendaraan Baru sebagai berikut :</h6>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Dealer</label>
              <input type="text" class="form-control @error('dealer') is-invalid @enderror" name="dealer" value="{{ old('dealer') }}" required autocomplete="dealer" autofocus>
            </div>
            <div class="col-sm-4">
              <label for="">Dealer</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Merk</label>
              <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}" required autocomplete="merk" autofocus>
            </div>
            <div class="col-sm-4">
              <label for="">Deskripsi</label>
              <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" required autocomplete="deskripsi" autofocus>
            </div>
            <div class="col-sm-4">
              <label for="">BBN</label>
              <input type="text" class="form-control @error('bbn') is-invalid @enderror" name="bbn" value="{{ old('bbn') }}" required autocomplete="bbn" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tipe</label>
              <input type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe" value="{{ old('tipe') }}" required autocomplete="tipe" autofocus>
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">OTR</label>
              <input type="text" class="form-control @error('otr') is-invalid @enderror" name="otr" value="{{ old('otr') }}" required autocomplete="otr" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tahun</label>
              <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun" autofocus>
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">Karoseri</label>
              <input type="text" class="form-control @error('karoseri') is-invalid @enderror" name="karoseri" value="{{ old('karoseri') }}" required autocomplete="karoseri" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Warna</label>
              <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna') }}" required autocomplete="warna" autofocus>
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">Total</label>
              <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ old('total') }}" required autocomplete="total" autofocus>
            </div>
        </div>
        <input type="text" class="form-control" name="status_transaksi" value="Belum Dibayar" hidden>
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
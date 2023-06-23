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
            <h1 class="h3 mb-0 text-gray-800">Berita Serah Terima Dealer Untuk Wahana Arthadinamika</h1>
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

    <form method="post" action="{{ route('stdealertowahana.create') }}" class="container-fluid">
        @csrf
        <b>
        <h4 class="h4 mb-10 text-gray-800">1. Data Kendaraan</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Merk</label>
              <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk') }}" required autocomplete="merk" autofocus>
              <label for="">Type</label>
              <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tahun</label>
              <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun" autofocus>
              <label for="">Warna</label>
              <input type="text" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna') }}" required autocomplete="tahun" autofocus>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Kategori Kendaraan</label>
              <input type="text" class="form-control @error('kategori_kendaraan') is-invalid @enderror" name="kategori_kendaraan" value="{{ old('kategori_kendaraan') }}" required autocomplete="kategori_kendaraan" autofocus>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nomor Mesin</label>
              <input type="text" class="form-control @error('nomor_mesin') is-invalid @enderror" name="nomor_mesin" value="{{ old('nomor_mesin') }}" required autocomplete="nomor_mesin" autofocus>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nomor Rangka</label>
              <input type="text" class="form-control @error('nomor_rangka') is-invalid @enderror" name="nomor_rangka" value="{{ old('nomor_rangka') }}" required autocomplete="nomor_rangka" autofocus>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nomor Polisi</label>
              <input type="text" class="form-control @error('nomor_polisi') is-invalid @enderror" name="nomor_polisi" value="{{ old('nomor_polisi') }}" required autocomplete="nomor_polisi" autofocus>
            </div>
        </div>
        <h5 class="h4 mb-10 text-gray-800">2. Data Surat Kendaraan  </h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nomor STNK</label>
              <input type="text" class="form-control @error('nomor_stnk') is-invalid @enderror" name="nomor_stnk" value="{{ old('nomor_stnk') }}" required autocomplete="nomor_stnk" autofocus>
              <label for="">Wilayah STNK</label>
              <input type="text" class="form-control @error('wilayah_stnk') is-invalid @enderror" name="wilayah_stnk" value="{{ old('wilayah_stnk') }}" required autocomplete="wilayah_stnk" autofocus>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tanggal Jatuh Tempo STNK</label>
              <input type="date" class="form-control @error('tgl_jt_stnk') is-invalid @enderror" name="tgl_jt_stnk"  value="{{ old('tgl_jt_stnk') }}" required autocomplete="tgl_jt_stnk" autofocus>
              <label for="">Jumlah Bayar STNK</label>
              <input type="integer" class="form-control @error('jumlah_b_stnk') is-invalid @enderror" placeholder="Rp." name="jumlah_b_stnk" id="jumlah_b_stnk" value="{{ old('jumlah_b_stnk') }}" required autocomplete="jumlah_b_stnk" onchange="hitungTotal()"autofocus >
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nama Pemegang BPKB</label>
              <input type="text" class="form-control @error('nama_pegang_bpkb') is-invalid @enderror" name="nama_pegang_bpkb" value="{{ old('nama_pegang_bpkb') }}" required autocomplete="nama_pegang_bpkb" autofocus>
              <label for="">Posisi BPKB</label>
              <input type="text" class="form-control @error('posisi_bpkb') is-invalid @enderror" name="posisi_bpkb" value="{{ old('posisi_bpkb') }}" required autocomplete="posisi_bpkb" autofocus>
            </div>
        </div><h5 class="h4 mb-10 text-gray-800">3. Data Berita Serah Terima Kendaraan Dealer  </h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nomor Berita Serah Terima</label>
              <input type="text" class="form-control @error('no_bst') is-invalid @enderror" name="no_bst" value="{{ old('no_bst') }}" required autocomplete="no_bst" autofocus>
              <label for="">Tanggal Serah Terima</label>
              <input type="date" class="form-control @error('tgl_st') is-invalid @enderror" name="tgl_st" value="{{ old('tgl_st') }}" required autocomplete="tgl_st" autofocus>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nama Yang Menyerahkan</label>
              <input type="text" class="form-control @error('nama_penyerah') is-invalid @enderror" name="nama_penyerah" value="{{ old('nama_penyerah') }}" required autocomplete="nama_penyerah" autofocus>
              <label for="">Nama Yang Menerima</label>
              <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" name="nama_penerima" value="{{ old('nama_penerima') }}" required autocomplete="nama_penerima" autofocus>
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
  <script>
    $(document).ready(function() {
      $('#jumlah_b_stnk').on('input', function() {
            var value = $(this).val();
            if (value !== '') {
                value = value.replace(/[^\d]/g, ''); // Menghapus semua karakter selain angka
                value = 'Rp ' + formatNumber(value);
            }
            $(this).val(value);
            hitungTotal(); // Memanggil fungsi hitungTotal() setiap kali nilai input berubah
        });

        // Fungsi untuk menambahkan pemisah ribuan
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    });
</script>


</body>

</html>
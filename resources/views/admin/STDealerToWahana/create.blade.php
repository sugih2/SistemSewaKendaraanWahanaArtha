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

    <form method="post" action="{{ route('stdealertowahana.store', ['id_pengajuanpembelian' => $pengajuan_pembelian->id_pengajuanpembelian]) }}" class="container-fluid">
        @csrf
        <b>
          <input type="text" class="form-control" value="{{$pengajuan_pembelian->id_pengajuanpembelian}}" hidden>
        <h4 class="h4 mb-10 text-gray-800">1. Data Kendaraan</h4>
        <div class="form-group row">
            
            <div class="col-sm-12 mb-3 mb-sm-0">
              <label for="kategori">Kategori Kendaraan</label>
              <div class="d-flex justify-content-center">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>
                    <input type="radio" name="kategori" value="Passanger" class="@error('kategori') is-invalid @enderror" required autocomplete="kategori" autofocus onclick="toggleKIRInput(false)">
                    Passanger
                  </label>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>
                    <input type="radio" name="kategori" value="Komersil" class="@error('kategori') is-invalid @enderror" required autocomplete="kategori" autofocus onclick="toggleKIRInput(true)">
                    Komersil
                  </label>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Merk</label>
              <input type="text" class="form-control" name="merk" value="{{ $pengajuan_pembelian->merk }}" readonly>
              <label for="">Type</label>
              <input type="text" class="form-control" name="type" value="{{ $pengajuan_pembelian->tipe }}" readonly>
              <label for="">Tahun</label>
              <input type="text" class="form-control" name="tahun" value="{{ $pengajuan_pembelian->tahun }}" readonly>
              <label for="">Warna</label>
              <input type="text" class="form-control" name="warna" value="{{ $pengajuan_pembelian->warna }}" readonly>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Nomor Mesin</label>
              <input type="text" class="form-control @error('no_mesin') is-invalid @enderror" name="no_mesin" value="{{ old('no_mesin') }}" required autocomplete="no_mesin" autofocus>
              <label for="">Nomor Rangka</label>
              <input type="text" class="form-control @error('no_rangka') is-invalid @enderror" name="no_rangka" value="{{ old('no_rangka') }}" required autocomplete="no_rangka" autofocus>
              <label for="">Nomor Polisi</label>
              <input type="text" class="form-control @error('no_polisi') is-invalid @enderror" name="no_polisi" value="{{ old('no_polisi') }}" required autocomplete="no_polisi" autofocus>
              <label for="">Lokasi</label>
              <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" required autocomplete="lokasi" autofocus>
            </div>
        </div>
        
        <h5 class="h4 mb-10 text-gray-800">2. Data Surat Kendaraan  </h5>
        <div class="row">
          <div class="col-sm-4 mb-3 mb-sm-0">
            <label for="">Tanggal Jatuh Tempo STNK</label>
            <input type="date" class="form-control @error('tanggal_jt_stnk') is-invalid @enderror" name="tanggal_jt_stnk" value="{{ old('tanggal_jt_stnk') }}" required autocomplete="tanggal_jt_stnk" autofocus>
          </div>
          <div class="col-sm-4 mb-3 mb-sm-0">
            <label for="">Tanggal Bayar STNK</label>
            <input type="date" class="form-control @error('tanggal_bayar_stnk') is-invalid @enderror" name="tanggal_bayar_stnk" value="{{ old('tanggal_bayar_stnk') }}" required autocomplete="tanggal_bayar_stnk" autofocus>
          </div>
          <div class="col-sm-4 mb-3 mb-sm-0">
            <label for="">Jumlah Bayar STNK</label>
            <input type="integer" class="form-control @error('biaya_stnk') is-invalid @enderror" placeholder="Rp." name="biaya_stnk" id="biaya_stnk" value="{{ old('biaya_stnk') }}" required autocomplete="biaya_stnk" autofocus>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 mb-3 mb-sm-0" id="kirInputs1" style="display: none;">
            <label for="">Tanggal Jatuh Tempo KIR</label>
            <input type="date" class="form-control @error('tanggal_jt_kir') is-invalid @enderror" name="tanggal_jt_kir" value="{{ old('tanggal_jt_kir') }}" autocomplete="tanggal_jt_kir" autofocus>
          </div>
          <div class="col-sm-4 mb-3 mb-sm-0" id="kirInputs2" style="display: none;">
            <label for="">Tanggal Bayar KIR</label>
            <input type="date" class="form-control @error('tanggal_bayar_kir') is-invalid @enderror" name="tanggal_bayar_kir" value="{{ old('tanggal_bayar_kir') }}" autocomplete="tanggal_bayar_kir" autofocus>
          </div>
          <div class="col-sm-4 mb-3 mb-sm-0" id="kirInputs3" style="display: none;">
            <label for="">Jumlah Bayar KIR</label>
            <input type="integer" class="form-control @error('biaya_kir') is-invalid @enderror" placeholder="Rp." name="biaya_kir" id="biaya_kir" value="{{ old('biaya_kir') }}" autocomplete="biaya_kir" autofocus>
          </div>
        </div>
        

        <h5 class="h4 mb-10 text-gray-800">3. Data Berita Serah Terima Kendaraan Dealer  </h4>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <label for="">Tanggal Serah Terima</label>
              <input type="date" class="form-control @error('tgl_st') is-invalid @enderror" name="tgl_st" value="{{ old('tgl_st') }}" required autocomplete="tgl_st" autofocus>
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Nama Yang Menyerahkan</label>
            <input type="text" class="form-control @error('nama_penyerah') is-invalid @enderror" name="nama_penyerah" value="{{ old('nama_penyerah') }}" required autocomplete="nama_penyerah" autofocus>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
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
      $('#biaya_stnk, #biaya_kir').on('input', function() {
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
    function toggleKIRInput(show) {
    var kirInputs1 = document.getElementById('kirInputs1');
    var kirInputs2 = document.getElementById('kirInputs2');
    var kirInputs3 = document.getElementById('kirInputs3');
    if (show) {
      kirInputs1.style.display = 'block';
      kirInputs2.style.display = 'block';
      kirInputs3.style.display = 'block';
    } else {
      kirInputs1.style.display = 'none';
      kirInputs2.style.display = 'none';
      kirInputs3.style.display = 'none';
    }
  }
</script>


</body>

</html>
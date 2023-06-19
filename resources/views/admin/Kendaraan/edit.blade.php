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
            <h1 class="h3 mb-0 text-gray-800">Penambahan Kendaraan Sewa</h1>
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

    <form method="POST" action="{{ route('kendaraan.update', $kendaraan->no_polisi) }}" class="container-fluid">
      @csrf
      @method('PUT')
        <h4 class="h4 mb-10 text-gray-800">1. Data Kendaraan</h4>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Jenis Kendaraan</label>
            <input type="text" class="form-control" name="jenis" value="{{$kendaraan->jenis}}">
          </div>
          <div class="col-sm-6">
            <label for="">No Polisi</label>
            <input type="text" class="form-control" name="no_polisi" value="{{$kendaraan->no_polisi}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Merk</label>
            <input type="text" class="form-control" name="merk" value="{{$kendaraan->merk}}">
          </div>
          <div class="col-sm-6">
            <label for="">No Rangka</label>
            <input type="text" class="form-control" name="no_rangka" value="{{$kendaraan->no_rangka}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Tipe</label>
            <input type="text" class="form-control" name="tipe" value="{{$kendaraan->tipe}}">
          </div>
          <div class="col-sm-6">
            <label for="">No Mesin</label>
            <input type="text" class="form-control" name="no_mesin" value="{{$kendaraan->no_mesin}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Tahun Rakitan</label>
            <input type="date" class="form-control" name="tahun_rakitan" min="YYYY-01-01" max="{{ date('Y-m-d') }}" value="{{$kendaraan->tahun_rakitan}}">
          </div>
          <div class="col-sm-6">
            <label for="">Lokasi Kendaraan</label>
            <input type="text" class="form-control" name="lokasi" value="{{$kendaraan->lokasi}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Warna</label>
            <input type="text" class="form-control" name="warna" value="{{$kendaraan->warna}}">
          </div>
          <div class="col-sm-6">
            <label for="">Status</label>
            <input type="text" class="form-control" name="status" value="{{$kendaraan->status}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Kondisi</label>
            <input type="text" class="form-control" name="kondisi" value="{{$kendaraan->kondisi}}">
          </div>
          <div class="col-sm-6">
            <label for="">Tahun</label>
            <input type="text" class="form-control" name="tahun" value="{{$kendaraan->tahun}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Rate</label>
            <input type="text" class="form-control" name="rate" value="{{$kendaraan->rate}}">
          </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">2. Data Pembelian</h4>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Tanggal Pembelian</label>
            <input type="date" class="form-control" name="tanggal_beli" max="{{ date('Y-m-d') }}" value="{{$kendaraan->tanggal_beli}}">
          </div>
          <div class="col-sm-6">
            <label for="">Karoseri</label>
            <input type="text" class="form-control" placeholder="Rp." name="karoseri" id="karoseri" onchange="hitungTotal()" value="{{$kendaraan->karoseri}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Harga Off</label>
            <input type="text" class="form-control" placeholder="Rp." name="harga_off" id="harga_off" onchange="hitungTotal()" value="{{$kendaraan->harga_off}}">
          </div>
          <div class="col-sm-6">
            <label for="">Total Pembelian</label>
            <input type="text" class="form-control" placeholder="Rp." name="total" id="total_pembelian" readonly value="{{$kendaraan->total}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">BBN</label>
            <input type="text" class="form-control" placeholder="Rp." name="bbn" id="bbn" onchange="hitungTotal()" value="{{$kendaraan->bbn}}">
          </div>
          <div class="col-sm-6">
            <label for="">Harga Sewa</label>
            <input type="text" class="form-control" placeholder="Rp." name="harga_sewa" id="harga_sewa" value="{{$kendaraan->harga_sewa}}">
          </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">3. Data BPKB</h4>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Nama Pemegang</label>
            <input type="text" class="form-control" name="nama_bpkb" value="{{$kendaraan->bpkb->nama_bpkb}}">
          </div>
          <div class="col-sm-6">
            <label for="">Posisi BPKB</label>
            <input type="text" class="form-control" name="posisi_bpkb" value="{{$kendaraan->bpkb->posisi_bpkb}}">
          </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">4. Data STNK</h4>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" name="tanggal_jt_stnk" max="{{ date('Y-m-d') }}" value="{{$kendaraan->stnk->tanggal_jt_stnk}}">
          </div>
          <div class="col-sm-6">
            <label for="">Tanggal Bayar</label>
            <input type="date" class="form-control" name="tanggal_bayar_stnk" max="{{ date('Y-m-d') }}" value="{{$kendaraan->stnk->tanggal_bayar_stnk}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label for="">Jumlah Bayar</label>
            <input type="text" class="form-control" placeholder="Rp." name="biaya_stnk" id="biaya_stnk" value="{{$kendaraan->stnk->biaya_stnk}}">
          </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">5. Data KIR</h4>
        <div class="form-group row">
          <div class="col-sm-6  mb-3 mb-sm-0">
            <label for="">Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" name="tanggal_jt_kir" max="{{ date('Y-m-d') }}" value="{{$kendaraan->kir->tanggal_jt_kir}}">
          </div>
          <div class="col-sm-6">
            <label for="">Tanggal Bayar</label>
            <input type="date" class="form-control" name="tanggal_bayar_kir" max="{{ date('Y-m-d') }}" value="{{$kendaraan->kir->tanggal_bayar_kir}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label for="">Jumlah Bayar</label>
            <input type="text" class="form-control" placeholder="Rp." name="biaya_kir" id="biaya_kir" value="{{$kendaraan->kir->biaya_kir}}">
          </div>
        </div>
        <div class="form-group row col-sm-6  mb-3 mb-sm-0">
            <input type="submit" class=" btn btn-sm btn-primary shadow-sm" value="Submit">
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

  <script>
    $(document).ready(function() {
      $('#karoseri, #harga_off, #bbn, #biaya_stnk, #biaya_kir, #harga_sewa').on('input', function() {
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

    function hitungTotal() {
        var karoseri = parseFloat(document.getElementById('karoseri').value.replace(/[^\d]/g, "")) || 0;
        var hargaOff = parseFloat(document.getElementById('harga_off').value.replace(/[^\d]/g, "")) || 0;
        var bbn = parseFloat(document.getElementById('bbn').value.replace(/[^\d]/g, "")) || 0;

        var total = karoseri + hargaOff + bbn;
        document.getElementById('total_pembelian').value = 'Rp ' + total;
    }
</script>



</body>

</html>
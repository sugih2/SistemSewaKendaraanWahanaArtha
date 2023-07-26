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
            <h1 class="h3 mb-0 text-gray-800">Revisi Pembelian Kendaraan</h1>
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

    <form method="post" action="{{ route('pengajuanpembelian.update', $pengajuan_pembelian->id_pengajuanpembelian) }}" class="container-fluid">
        @csrf
        @method('PUT')
        <b>
        <h4 class="h4 mb-10 text-gray-800">1. SPPK</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nama PT</label>
              <input type="text" class="form-control" name="nama_pt" readonly>
            </div>
            <div class="col-sm-4">
              <label for="">Cabang</label>
              <input type="text" class="form-control" name="nama_cabang" readonly>
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" name="" readonly>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">JW Sewa</label>
              <input type="text" class="form-control" name="" readonly>
            </div>
            <div class="col-sm-4">
              <label for="">Biaya Sewa</label>
              <input type="text" class="form-control" name="" readonly>
            </div>
            <div class="col-sm-4">
              <label for="">% Biaya Sewa</label>
              <input type="text" class="form-control" name="" readonly>
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">2. Surat Penawaran Harga Kendaraan</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Dealer</label>
              <input type="text" class="form-control" name="nama_p_dealer" value="{{$pengajuan_pembelian->nama_p_dealer}}">
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" name="tanggal_p_dealer" value="{{$pengajuan_pembelian->tanggal_p_dealer}}">
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control" name="harga_p_dealer" value="{{$pengajuan_pembelian->harga_p_dealer}}">
            </div>
        </div>
        <h4 class="h4 mb-10 text-gray-800">3. Surat Penawaran Karoseri</h4>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Nama PT</label>
              <input type="text" class="form-control" name="nama_pt_karoseri" value="{{$pengajuan_pembelian->nama_pt_karoseri}}">
            </div>
            <div class="col-sm-4">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" name="tanggal_p_karoseri" value="{{$pengajuan_pembelian->tanggal_p_karoseri}}">
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control" name="harga_p_karoseri" value="{{$pengajuan_pembelian->harga_p_karoseri}}">
            </div>
        </div>
        <br>
        <h6 class="h5 mb-10 text-gray-800">Sehubungan dengan hal tersebut di atas, dengan ini kami ajukan pembelian Kendaraan Baru sebagai berikut :</h6>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Dealer</label>
              <input type="text" class="form-control" name="dealer" value="{{$pengajuan_pembelian->dealer}}">
            </div>
            <div class="col-sm-4">
              <label for="">Dealer</label>
              <input type="text" class="form-control" name="">
            </div>
            <div class="col-sm-4">
              <label for="">Harga</label>
              <input type="text" class="form-control" name="harga" value="{{$pengajuan_pembelian->harga}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Merk</label>
              <input type="text" class="form-control" name="merk" value="{{$pengajuan_pembelian->merk}}">
            </div>
            <div class="col-sm-4">
              <label for="">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi" value="{{$pengajuan_pembelian->deskripsi}}">
            </div>
            <div class="col-sm-4">
              <label for="">BBN</label>
              <input type="text" class="form-control" name="bbn" value="{{$pengajuan_pembelian->bbn}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tipe</label>
              <input type="text" class="form-control" name="tipe" value="{{$pengajuan_pembelian->tipe}}">
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">OTR</label>
              <input type="text" class="form-control" name="otr" value="{{$pengajuan_pembelian->otr}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Tahun</label>
              <input type="text" class="form-control" name="tahun" value="{{$pengajuan_pembelian->tahun}}">
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">Karoseri</label>
              <input type="text" class="form-control" name="karoseri" value="{{$pengajuan_pembelian->karoseri}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <label for="">Warna</label>
              <input type="text" class="form-control" name="warna" value="{{$pengajuan_pembelian->warna}}">
            </div>
            <div class="col-sm-4 offset-sm-4">
              <label for="">Total</label>
              <input type="text" class="form-control" name="total" value="{{$pengajuan_pembelian->total}}">
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <label for="">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" value="{{$pengajuan_pembelian->keterangan}}" readonly>
          </div>
      </div>
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
      $('#biaya_sewa, #harga_p_dealer, #harga_p_karoseri, #harga, #bbn, #karoseri, #otr, #total').on('input', function() {
            var value = $(this).val();
            if (value !== '') {
                value = value.replace(/[^\d]/g, ''); // Menghapus semua karakter selain angka
                value = 'Rp ' + formatNumber(value);
            }
            $(this).val(value);
            hitungTotal(); // Memanggil fungsi hitungTotal() setiap kali nilai input berubah
        });

        function hitungTotal() {
        var harga = parseFloat(document.getElementById('harga').value.replace(/[^\d]/g, "")) || 0;
        var bbn = parseFloat(document.getElementById('bbn').value.replace(/[^\d]/g, "")) || 0;
        var otr = parseFloat(document.getElementById('otr').value.replace(/[^\d]/g, "")) || 0;
        var karoseri = parseFloat(document.getElementById('karoseri').value.replace(/[^\d]/g, "")) || 0;

        var total = harga + bbn + otr + karoseri;
        var formattedTotal = formatNumber(total);
        var totalInput = document.getElementById('total');
        totalInput.value = 'Rp ' + formattedTotal;
        totalInput.setAttribute( 'placeholder','Rp ' + formattedTotal);
    }

        // Fungsi untuk menambahkan pemisah ribuan
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    });
    
  </script>

</body>

</html>
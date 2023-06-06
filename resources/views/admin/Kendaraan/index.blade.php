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
            <h1 class="h3 mb-0 text-gray-800">Halo Admin</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <a href={{ route('kendaraan.create') }} class="btn btn-success">Tambah Paket</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Polisi</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Tanggal Beli</th>
                    <th>Nama BPKB</th>
                    <th>Biaya STNK</th>
                    <th>Biaya KIR</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kendaraans as $kendaraan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kendaraan->no_polisi }}</td>
                        <td>{{ $kendaraan->merk }}</td>
                        <td>{{ $kendaraan->tipe}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{route('paket.edit', $kendaraan->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td><form action="{{ route('paket.destroy', $kendaraan->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            

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
@extends('layouts.admin.app') {{-- Ganti 'master' sesuai layout kamu --}}

@section('title', 'Data Prediksi')

@section('content')
  <!-- Breadcrumb -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/index.html">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
          </ul>
        </div>
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mb-0">Data Prediksi</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Daftar User</h5>
          <small>Data user yang telah terdaftar dalam sistem.</small>
        </div>
        <div class="card-body">
          <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
              <thead>
               {{-- "data_histori": [
                {
                    "_id": "683e674148fc822b5bf87ab2",
                    "age": 40.0,
                    "blood_pressure": 89.0,
                    "bmi": 20.761245674740486,
                    "created_at": "Tue, 03 Jun 2025 03:08:49 GMT",
                    "data_pasien": {
                        "_id": "683325be981d3b1e6edcdbef",
                        "alamat": "Probolinggo",
                        "gender": "l",
                        "id_user": "683325be981d3b1e6edcdbee",
                        "nama_belakang": "Bahtiar",
                        "nama_depan": "Mahayoga",
                        "tanggal_lahir": "25-05-2025",
                        "umur": "20"
                    },
                    "data_user": {
                        "_id": "683325be981d3b1e6edcdbee",
                        "email": "mahayogabahtiar12@gmail.com",
                        "is_verified": true,
                        "password": "runaraito12",
                        "role": "user",
                        "username": "Runa"
                    },
                    "diabetes_pedigree_function": 0.16666666666666666,
                    "glucose": 86.0,
                    "id_user": "683325be981d3b1e6edcdbee",
                    "insulin": 93.0,
                    "outcome": 0,
                    "pregnancies": 3.0,
                    "skin_thickness": 28.0
                }, --}}
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Usia</th>
                  <th>Jenis Kelamin</th>
                  <th>Tekanan Darah</th>
                  <th>BMI</th>
                  <th>Glukosa</th>
                  <th>Hasil Prediksi</th>
                  <th>Tanggal Prediksi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($dataHistori as $item)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $item['data_pasien']['nama_depan'] }}</td>
                    <td>{{ $item['data_pasien']['umur'] }}</td>
                    @if ($item['data_pasien']['gender'] == 'l')
                      <td>Laki - Laki</td>
                    @elseif ($item['data_pasien']['gender'] == 'p')
                      <td>Perempuan</td>
                    @endif
                    <td>{{ $item['blood_pressure'] }}</td>
                    <td>{{ $item['bmi'] }}</td>
                    <td>{{ $item['glucose'] }}</td>
                    <td>{{ $item['outcome'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>
                      <button type="button" class="btn btn-info" onclick="infoData('{{ $item['_id'] }}')" data-bs-toggle="modal" data-bs-target="#infoModal">
                        Info
                      </button>
                    </td>
                  </tr>
                  @php
                    $i++;
                  @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End row -->

  <!-- Modal Info Data -->
  <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Info Data Pasien</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              {{-- "data_histori": [
                {
                    "_id": "683e674148fc822b5bf87ab2",
                    "age": 40.0,
                    "blood_pressure": 89.0,
                    "bmi": 20.761245674740486,
                    "created_at": "Tue, 03 Jun 2025 03:08:49 GMT",
                    "data_pasien": {
                        "_id": "683325be981d3b1e6edcdbef",
                        "alamat": "Probolinggo",
                        "gender": "l",
                        "id_user": "683325be981d3b1e6edcdbee",
                        "nama_belakang": "Bahtiar",
                        "nama_depan": "Mahayoga",
                        "tanggal_lahir": "25-05-2025",
                        "umur": "20"
                    },
                    "data_user": {
                        "_id": "683325be981d3b1e6edcdbee",
                        "email": "mahayogabahtiar12@gmail.com",
                        "is_verified": true,
                        "password": "runaraito12",
                        "role": "user",
                        "username": "Runa"
                    },
                    "diabetes_pedigree_function": 0.16666666666666666,
                    "glucose": 86.0,
                    "id_user": "683325be981d3b1e6edcdbee",
                    "insulin": 93.0,
                    "outcome": 0,
                    "pregnancies": 3.0,
                    "skin_thickness": 28.0
                }, --}}
              <tr>
                <td>Email</td>
                <td>
                  <td id="info-email"></td>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

@endsection
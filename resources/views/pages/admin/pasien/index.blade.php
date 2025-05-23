@extends('layouts.admin.app') {{-- Ganti 'master' sesuai layout kamu --}}

@section('title', 'Data Pasien')

@section('content')
  <!-- Breadcrumb -->
  <div class="page-header">
    <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
      </ul>
      </div>
      <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="mb-0">Data Pasien</h2>
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
        <div class="row justify-content-between">
          <div class="col-md-6">
            <h5>Daftar Pasien</h5>
            <small>Data pasien yang telah terdaftar dalam sistem.</small>
          </div>
          <div class="col-md-6">
            <div class="row justify-content-end">
              <div class="col-md-4">
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah Data</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
          <th>No</th>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
          <th>Umur</th>
          <th>Gender</th>
          <th>Alamat</th>
          <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="table-data">
          @if ($hasil['status'] == 'success')
            @php
              $i = 1;
            @endphp
            @foreach ($hasil['data_pasien'] as $item)
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $item['nama_depan'] }}</td>
                <td>{{ $item['nama_belakang'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td>
                  <button class="btn btn-sm btn-warning" onclick="editData('{{ $item['_id'] }}')">Edit</button>
                  <button class="btn btn-sm btn-danger" onclick="hapusData('{{ $item['_id'] }}')">Hapus</button>
                </td>
              </tr>
              @php
                $i++;
              @endphp
            @endforeach
          @endif
        </tbody>
        </table>
      </div>
      </div>
    </div>
    </div>
  </div> <!-- End row -->

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pasien</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>Nama Depan</td>
                <td>
                  <input type="text" name="nama_depan-add" id="nama_depan-add" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Nama Belakang</td>
                <td>
                  <input type="text" name="nama_belakang-add" id="nama_belakang-add" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Umur</td>
                <td>
                  <input type="number" name="umur-add" id="umur-add" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select name="jenis_kelamin-add" id="jenis_kelamin-add" class="form-select">
                    <option value="notSelected">Pilih</option>
                    <option value="l">Laki - Laki</option>
                    <option value="p">Perempuan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <input type="text" name="alamat-add" id="alamat-add" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Email</td>
                <td>
                  <input type="email" name="email-add" id="email-add" class="form-control">
                </td>
              </tr>
              <tr>
                <td>Password</td>
                <td>
                  <input type="text" name="password-add" id="password-add" class="form-control">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="addData()">Simpan Data</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function getData() {
      let xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let table = document.getElementById('table-data');
            let i = 1;
            table.innerHTML = '';
            data.data_pasien.forEach(element => {
              table.innerHTML += `
                <tr>
                  <td>${ i }</td>
                  <td>${ element.nama_depan }</td>
                  <td>${ element.nama_belakang }</td>
                  <td>${ element.umur }</td>
                  <td>${ element.gender }</td>
                  <td>${ element.alamat }</td>
                  <td>
                    <button class="btn btn-sm btn-warning" onclick="editData('${ element._id }')">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="hapusData('${ element._id }')">Hapus</button>
                  </td>
                </tr>
              `;
              i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("pasien.getDataPasien") }}', true);
      xhttp.send();
    }

    function addData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();

      let fieldNamaDepan = document.getElementById('nama_depan-add').value;
      let fieldNamaBelakang = document.getElementById('nama_belakang-add').value;
      let fieldUmur = document.getElementById('umur-add').value;
      let fieldJenisKelamin = document.getElementById('jenis_kelamin-add').value;
      let fieldAlamat = document.getElementById('alamat-add').value;
      let fieldEmail = document.getElementById('email-add').value;
      let fieldPassword = document.getElementById('password-add').value;
      let token = document.getElementsByName('csrf-token')[0].content

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            alert('Tambah data berhasil!');
            getData();
          } else {
            alert('Tambah data gagal!\n' + data.msg);
          }
        }
      };

      formData.append('nama_depan', fieldNamaDepan);
      formData.append('nama_belakang', fieldNamaBelakang);
      formData.append('umur', fieldUmur);
      formData.append('jenis_kelamin', fieldJenisKelamin);
      formData.append('alamat', fieldAlamat);
      formData.append('email', fieldEmail);
      formData.append('password', fieldPassword);
      formData.append('_token', token);

      xhttp.open('POST', '{{ route("data-pasien.store") }}', true);
      xhttp.send(formData);
    }
  </script>
@endsection

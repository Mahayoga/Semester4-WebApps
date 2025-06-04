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
                <button type="button" onclick="createData()" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah Data</button>
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
            {{-- {{dd($item)}} --}}
              <tr>
                <td>{{ $i }}</td>
                <td>{{ $item['nama_depan'] }}</td>
                <td>{{ $item['nama_belakang'] }}</td>
                <td>{{ $item['umur'] }}</td>
                <td>{{ $item['gender'] }}</td>
                <td>{{ $item['alamat'] }}</td>
                <td>
                  <button type="button" class="btn btn-info" onclick="infoData('{{ $item['_id'] }}')" data-bs-toggle="modal" data-bs-target="#infoModal">
                    Info
                  </button>
                  <button type="button" class="btn btn-warning" onclick="editData('{{ $item['_id'] }}')" data-bs-toggle="modal" data-bs-target="#editModal">
                    Edit
                  </button>
                  <button type="button" class="btn btn-danger" onclick="hapusData('{{ $item['_id'] }}')" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                  </button>
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
            {{-- _id
            nama_depan
            nama_belakang
            tanggal_lahir
            umur
            gender
            alamat
            id_user --}}
              <tr>
                <td>Nama Depan</td>
                <td>
                  <td id="info-nama_depan"></td>
                </td>
              </tr>
              <tr>
                <td>Nama Belakang</td>
                <td>
                  <td id="info-nama_belakang"></td>
                </td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>
                  <td id="info-tanggal_lahir"></td>
                </td>
              </tr>
              <tr>
                <td>Umur</td>
                <td>
                  <td id="info-umur"></td>
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <td id="info-gender"></td>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <td id="info-alamat"></td>
                </td>
              </tr>
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
                <td>Tanggal Lahir</td>
                <td>
                  <input type="date" name="tgl_lahir-add" id="tgl_lahir-add" class="form-control">
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
                <td>Akun user</td>
                <td>
                  <select name="" id="akun_user-add" class="form-select">
                    <option value="notSelected">Pilih</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="addData()" data-bs-dismiss="modal">Simpan Data</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Data -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pasien</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tbody>
              {{-- _id
            nama_depan
            nama_belakang
            tanggal_lahir
            umur
            gender
            alamat
            id_user --}}
              <tr>
                <td>Nama Depan</td>
                <td>
                  <td>
                    <input type="text" class="form-control" id="edit-nama_depan">
                  </td>
                </td>
              </tr>
              <tr>
                <td>Nama Belakang</td>
                <td>
                  <td>
                    <input type="text" class="form-control" id="edit-nama_belakang">
                  </td>
                </td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>
                  <td>
                    <input type="text" class="form-control" id="edit-tanggal_lahir">
                  </td>
                </td>
              </tr>
              <tr>
                <td>Umur</td>
                <td>
                  <td>
                    <input type="text" class="form-control" id="edit-umur">
                  </td>
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <td>
                    <select name="" id="edit-gender" class="form-select">
                      <option value="notSelected">Pilih</option>
                      <option value="l">Laki - Laki</option>
                      <option value="p">Perempuan</option>
                    </select>
                  </td>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                  <td>
                    <input type="text" class="form-control" id="edit-alamat">
                  </td>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="editModal()" data-bs-dismiss="modal">Simpan Data</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    idHapus;
    idEdit;

    function createData() {
      let xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let akunUser = document.getElementById('akun_user-add');
            let i = 1;
            akunUser.innerHTML = '<option value="notSelected">Pilih</option>';
            data.data_user.forEach(element => {
              akunUser.innerHTML += `
                <option value="${element._id}">${element.username}</option>
              `;
              i++;
            });
          }
        }
      };

      xhttp.open('GET', '{{ route("data-pasien.create") }}', true);
      xhttp.send();
    }

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
                    <button type="button" class="btn btn-info" onclick="infoData('${element._id}')" data-bs-toggle="modal" data-bs-target="#infoModal">
                      Info
                    </button>
                    <button type="button" class="btn btn-warning" onclick="editData('${element._id}')" data-bs-toggle="modal" data-bs-target="#editModal">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger" onclick="hapusData('${element._id}')" data-bs-toggle="modal" data-bs-target="#hapusModal">
                      Hapus
                    </button>
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
      let fieldTglLahir = document.getElementById('tgl_lahir-add').value.split('-');
      let fieldUmur = document.getElementById('umur-add').value;
      let fieldJenisKelamin = document.getElementById('jenis_kelamin-add').value;
      let fieldAlamat = document.getElementById('alamat-add').value;
      let fieldAkunUser = document.getElementById('akun_user-add').value;
      let token = document.getElementsByName('csrf-token')[0].content

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            Swal.fire({
              title: "Tambah Data Berhasil!",
              text: "Data berhasil di tambah!",
              icon: "success"
            });
            getData();
          } else {
            Swal.fire({
              title: "Tambah Data Gagal!",
              text: "Data gagal di tambah!",
              icon: "error"
            });
          }
        }
      };

      formData.append('nama_depan', fieldNamaDepan);
      formData.append('nama_belakang', fieldNamaBelakang);
      formData.append('tanggal_lahir', fieldTglLahir[2] + '-' + fieldTglLahir[1] + '-' + fieldTglLahir[0]);
      formData.append('umur', fieldUmur);
      formData.append('jenis_kelamin', fieldJenisKelamin);
      formData.append('alamat', fieldAlamat);
      formData.append('id_user', fieldAkunUser);
      formData.append('_token', token);

      xhttp.open('POST', '{{ route("data-pasien.store") }}', true);
      xhttp.send(formData);
    }
  
    function infoData(id) {
      let xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let nama_depanField = document.getElementById('info-nama_depan');
            let nama_belakangField = document.getElementById('info-nama_belakang');
            let tanggal_lahirField = document.getElementById('info-tanggal_lahir');
            let umurField = document.getElementById('info-umur');
            let genderField = document.getElementById('info-gender');
            let alamatField = document.getElementById('info-alamat');
            let emailField = document.getElementById('info-email');

            nama_depanField.innerHTML = data.data_pasien.nama_depan;
            nama_belakangField.innerHTML = data.data_pasien.nama_belakang;
            tanggal_lahirField.innerHTML = data.data_pasien.tanggal_lahir;
            umurField.innerHTML = data.data_pasien.umur;
            if(data.data_pasien.gender == 'l') {
              genderField.innerHTML = 'Laki - Laki';
            } else if(data.data_pasien.gender == 'p') {
              genderField.innerHTML = 'Perempuan';
            }
            alamatField.innerHTML = data.data_pasien.alamat;
            emailField.innerHTML = data.data_pasien.email;
          }
        }
      }

      let url = '{{ route("data-pasien.show", ["data_pasien" => "__ID__"]) }}'.replace("__ID__", id);

      xhttp.open('GET', url, true);
      xhttp.send();
    }

    function editData(id) {
      idEdit = id;
      let xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let nama_depanField = document.getElementById('edit-nama_depan');
            let nama_belakangField = document.getElementById('edit-nama_belakang');
            let tanggal_lahirField = document.getElementById('edit-tanggal_lahir');
            let umurField = document.getElementById('edit-umur');
            let genderField = document.getElementById('edit-gender');
            let alamatField = document.getElementById('edit-alamat');

            nama_depanField.value = data.data_pasien.nama_depan;
            nama_belakangField.value = data.data_pasien.nama_belakang;
            tanggal_lahirField.value = data.data_pasien.tanggal_lahir;
            umurField.value = data.data_pasien.umur;
            if(data.data_pasien.gender == 'l') {
              genderField.value = 'l';
            } else if(data.data_pasien.gender == 'p') {
              genderField.value = 'p';
            }
            alamatField.value = data.data_pasien.alamat;
          }
        }
      }

      let url = '{{ route("data-pasien.edit", ["data_pasien" => "__ID__"]) }}'.replace("__ID__", id);

      xhttp.open('GET', url, true);
      xhttp.send();
    }

    function editModal() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            Swal.fire({
              title: "Edit Data Berhasil!",
              text: "Data berhasil di edit!",
              icon: "success"
            });
            getData();
          } else {
            Swal.fire({
              title: "Edit Data Gagal!",
              text: "Data gagal di edit!",
              icon: "error"
            });
          }
        }
      }

      let nama_depanField = document.getElementById('edit-nama_depan').value;
      let nama_belakangField = document.getElementById('edit-nama_belakang').value;
      let tanggal_lahirField = document.getElementById('edit-tanggal_lahir').value;
      let umurField = document.getElementById('edit-umur').value;
      let genderField = document.getElementById('edit-gender').value;
      let alamatField = document.getElementById('edit-alamat').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('nama_depan', nama_depanField);
      formData.append('nama_belakang', nama_belakangField);
      formData.append('tanggal_lahir', tanggal_lahirField);
      formData.append('umur', umurField);
      formData.append('gender', genderField);
      formData.append('alamat', alamatField);
      formData.append('_token', token);
      formData.append('_method', 'PATCH');

      let url = '{{ route("data-pasien.update", ["data_pasien" => "__ID__"]) }}'.replace("__ID__", idEdit);

      xhttp.open('POST', url, true);
      xhttp.send(formData);
    }
  
    function hapusData(id) {
      let xhttp = new XMLHttpRequest();
      Swal.fire({
        title: "Apakah anda ingin menghapus data ini?",
        showDenyButton: true,
        denyButtonText: "Hapus",
        confirmButtonText: "Batal",
        icon: "question"
      }).then((result) => {
        if (result.isDenied) {
          xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
              let data = JSON.parse(this.responseText);
              if(data.status == 'success') {
                Swal.fire("Berhasil", "Berhasil menghapus data!", "success");
                getData();
              } else {
                Swal.fire("Error", "Terjadi error saat menghapus data!" + data.msg, "error");
              }
            }
          };

          let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          let route = "{{ route('data-pasien.destroy', ['data_pasien' => '__ID__']) }}";
          xhttp.open('DELETE', route.replace('__ID__', id), true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', token);
          xhttp.send();
        }
      });
    }
  </script>
@endsection

@extends('layouts.admin.app') {{-- Ganti 'master' sesuai layout kamu --}}

@section('title', 'Data Pasien')

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
        <h2 class="mb-0">Data User</h2>
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
          <div class="row">
            <div class="col-md-8">
              <h5>Daftar User</h5>
              <small>Data user yang telah terdaftar dalam sistem.</small>
            </div>
            <div class="col-md-4">
              <div class="row justify-content-end">
                <div class="col-md-6">
                  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">
                    Tambah Data User
                  </button>
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
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="tbody">
                @php $i = 1; @endphp
                @foreach ($hasil['data_user'] as $item)
                  <tr>
                    <td>{{ $i }}</td>
                    @if ($item['username'] != '')
                      <td>{{$item['username']}}</td>
                    @else
                      <td><i>Username belum terdaftar</i></td>
                    @endif
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['role'] }}</td>
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
                  @php $i++; @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End row -->

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Data User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th>Username</th>
              <td>
                <input type="text" class="form-control" id="add-username">
              </td>
            </tr>
            <tr>
              <th>Email</th>
              <td>
                <input type="text" class="form-control" id="add-email">
              </td>
            </tr>
            <tr>
              <th>Role</th>
              <td>
                <select name="" id="add-role" class="form-select">
                  <option value="notSelected">Pilih</option>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                </select>
              </td>
            </tr>
            <tr>
              <th>Password</th>
              <td>
                <input type="text" class="form-control" id="add-password">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addData()">Tambah Data</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Info Modal -->
  <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Data User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th>Id User</th>
              <td id="info-user"></td>
            </tr>
            <tr>
              <th>Email</th>
              <td id="info-email"></td>
            </tr>
            <tr>
              <th>Role</th>
              <td id="info-role"></td>
            </tr>
            <tr>
              <th>Username</th>
              <td id="info-username"></td>
            </tr>
            <tr>
              <th>Email Terverifikasi</th>
              <td id="info-is_verified"></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Data User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th>Email</th>
              <td>
                <input type="text" class="form-control" id="edit-email">
              </td>
            </tr>
            <tr>
              <th>Role</th>
              <td>
                <select name="" id="edit-role" class="form-select">
                  <option value="notSelected">Pilih</option>
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                </select>
              </td>
            </tr>
            <tr>
              <th>Username</th>
              <td>
                 <input type="text" class="form-control" id="edit-username">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="editModal()">Edit Data</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    idEdit;

    function getData() {
      let xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let table = document.getElementById('tbody');
            let i = 1;
            table.innerHTML = '';
            data.data_user.forEach(element => {
              table.innerHTML += `
                <tr>
                  <td>${i}</td>
                  <td>${element.username}</td>
                  <td>${element.email}</td>
                  <td>${element.role}</td>
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
      }

      let url = '{{ route("data-user.getData") }}';

      xhttp.open('GET', url, true);
      xhttp.send();
    }

    function addData() {
      let xhttp = new XMLHttpRequest();
      let formData = new FormData();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
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
      }

      let emailField = document.getElementById('add-email').value;
      let roleField = document.getElementById('add-role').value;
      let usernameField = document.getElementById('add-username').value;
      let passwordField = document.getElementById('add-password').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('email', emailField);
      formData.append('role', roleField);
      formData.append('username', usernameField);
      formData.append('password', passwordField);
      formData.append('_token', token);

      let url = '{{ route("data-user.store") }}';

      xhttp.open('POST', url, true);
      xhttp.send(formData);
    }

    function infoData(id) {
      let xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if(this.status == 200 && this.readyState == 4) {
          let data = JSON.parse(this.responseText);
          if(data.status == 'success') {
            let idField = document.getElementById('info-user');
            let emailField = document.getElementById('info-email');
            let roleField = document.getElementById('info-role');
            let usernameField = document.getElementById('info-username');
            let isVerifiedField = document.getElementById('info-is_verified');

            idField.innerHTML = data.data_user._id;
            emailField.innerHTML = data.data_user.email;
            roleField.innerHTML = data.data_user.role;

            if(data.data_user.username == '') {
              usernameField.innerHTML = '<i>Username belum terdaftar</i>';
            } else {
              usernameField.innerHTML = data.data_user.username;
            }
            isVerifiedField.innerHTML = data.data_user.is_verified;
          }
        }
      }

      let url = '{{ route("data-user.show", ["data_user" => "__ID__"]) }}'.replace("__ID__", id);

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
            let emailField = document.getElementById('edit-email');
            let roleField = document.getElementById('edit-role');
            let usernameField = document.getElementById('edit-username');

            emailField.value = data.data_user.email;
            if(data.data_user.role == 'admin') {
              roleField.value = 'admin';
            } else if(data.data_user.role == 'user') {
              roleField.value = 'user';
            }
            usernameField.value = data.data_user.username
          }
        }
      }

      let url = '{{ route("data-user.edit", ["data_user" => "__ID__"]) }}'.replace("__ID__", id);

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

      let emailField = document.getElementById('edit-email').value;
      let roleField = document.getElementById('edit-role').value;
      let usernameField = document.getElementById('edit-username').value;
      let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      formData.append('email', emailField);
      formData.append('role', roleField);
      formData.append('username', usernameField);
      formData.append('_token', token);
      formData.append('_method', 'PATCH');

      let url = '{{ route("data-user.update", ["data_user" => "__ID__"]) }}'.replace("__ID__", idEdit);

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
          let route = "{{ route('data-user.destroy', ['data_user' => '__ID__']) }}";
          xhttp.open('DELETE', route.replace('__ID__', id), true);
          xhttp.setRequestHeader('X-CSRF-TOKEN', token);
          xhttp.send();
        }
      });
    }
  </script>
@endsection
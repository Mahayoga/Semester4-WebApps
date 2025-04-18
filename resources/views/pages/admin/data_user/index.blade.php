@extends('layouts.admin.app')
@section('content')
  @csrf
  <h1 class="mt-4">Data User / Pasien</h1>
  <hr>
  <a href="" onclick="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary"><i class="fas fa-add me-2"></i>Tambah Data</a>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <tr>
            <td>1</td>
            <td>Mahayoga Test</td>
            <td>myoga.bahtiar@gmail.com</td>
            <td class="d-flex">
              <a href="" class="btn btn-secondary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#showModal" onclick=""><i class="fas fa-eye"></i></a>
              <a href="" class="btn btn-primary p-2 mx-1" data-bs-toggle="modal" data-bs-target="#editModal" onclick=""><i class="fas fa-edit"></i></a>
              <a href="" class="btn btn-danger p-2 mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick=""><i class="fas fa-trash-can"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
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
                        <li class="breadcrumb-item active" aria-current="page">Data Prediksi</li>
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
                    <h5>Daftar Prediksi</h5>
                    <small>Data prediksi yang telah terdaftar dalam sistem.</small>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
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
                                <tr>
                                    <td>1</td>
                                    <td>Dewi Lestari</td>
                                    <td>28</td>
                                    <td>Perempuan</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Rudi Hartono</td>
                                    <td>35</td>
                                    <td>Laki-laki</td>
                                    <td>Jl. Kenanga No. 12</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>Jl. Melati No. 7</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection

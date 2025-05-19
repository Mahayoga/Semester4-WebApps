@extends('layouts.admin.app') {{-- Ganti 'master' sesuai layout kamu --}}

@section('title', 'Data Pasien')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data User | Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Halaman Data Pasien - Admin Template">
    <meta name="keywords" content="Mantis, Bootstrap, Admin Dashboard">
    <meta name="author" content="CodedThemes">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.svg') }}" type="image/x-icon">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}">
</head>
<body data-pc-theme="light">
    <!-- Pre-loader -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- Container -->
    <section class="pc-container">
        <div class="pc-content">
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
                            <h5>Daftar User</h5>
                            <small>Data user yang telah terdaftar dalam sistem.</small>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Password</th>
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
        </div>
    </section>

    <!-- JS Scripts -->
    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#simpletable').DataTable();
        });
    </script>
</body>
</html>
@endsection

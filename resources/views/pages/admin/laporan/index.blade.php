@extends('layouts.admin.app')

@section('title', 'Laporan Data Prediksi')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Laporan Data Prediksi Diabetes</h4>

    <!-- Filter tanggal laporan -->
    <form action="#" method="GET" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="start_date" class="col-form-label">Dari Tanggal</label>
            </div>
            <div class="col-auto">
                <input type="date" id="start_date" name="start_date" class="form-control" />
            </div>
            <div class="col-auto">
                <label for="end_date" class="col-form-label">Sampai Tanggal</label>
            </div>
            <div class="col-auto">
                <input type="date" id="end_date" name="end_date" class="form-control" />
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <!-- Tombol export -->
    <div class="mb-4">
        <a href="#" class="btn btn-success">
            <i class="ti ti-file-export"></i> Export Laporan (Excel / PDF)
        </a>
    </div>

    <!-- Tabel data laporan (dummy example) -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Hasil Prediksi</th>
                    <th>Tanggal Prediksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Andi</td>
                    <td>45</td>
                    <td>Risiko Rendah</td>
                    <td>2025-05-25</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Siti</td>
                    <td>52</td>
                    <td>Risiko Tinggi</td>
                    <td>2025-05-26</td>
                </tr>
                <!-- Tambah data dummy lainnya -->
            </tbody>
        </table>
    </div>
</div>
@endsection

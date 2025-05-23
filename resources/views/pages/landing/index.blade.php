<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login - Sistem Deteksi Diabetes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Sistem Deteksi Diabetes berbasis Machine Learning.">
  <meta name="keywords" content="Diabetes, Prediksi, Machine Learning, Laravel, Bootstrap">
  <meta name="author" content="Tim Pengembang">

  <link rel="icon" href="{{ asset('assets/admin/images/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="{{ asset('assets/admin/fonts/tabler-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/fonts/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/fonts/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/fonts/material.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style-preset.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/landing.css') }}">

  <style>
    .bg-white-section {
      background-color: #ffffff;
      color: #000000;
    }
    .bg-dark-section {
      background-color: #000000;
      color: #ffffff;
    }
    .bg-dark-section .card {
      background-color: #1a1a1a;
      border: none;
    }
    .bg-dark-section .card-body,
    .bg-dark-section h3,
    .bg-dark-section p {
      color: #ffffff;
    }
    .bg-dark-section .text-muted {
      color: #dddddd !important;
    }
  </style>
</head>

<body class="landing-page">
  <!-- Pre-loader -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <!-- Header -->
  <header id="home" class="bg-white-section">
    <nav class="navbar navbar-expand-md navbar-dark top-nav-collapse default">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('assets/admin/images/logo-white.svg') }}" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="../dashboard/index.html">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="../elements/bc_alert.html">Components</a></li>
            <li class="nav-item"><a class="nav-link" href="https://codedthemes.gitbook.io/mantis-bootstrap/" target="_blank">Documentation</a></li>
            <li class="nav-item"><a class="btn btn-primary" target="_blank" href="https://codedthemes.com/item/mantis-bootstrap-admin-dashboard/">Purchase Now</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md-6 col-xl-5">
          <h1 class="mt-4 mb-4 f-w-600">Selamat Datang di <span class="text-primary">Sistem Deteksi Diabetes Cerdas</span></h1>
          <h5 class="mb-4">
            Kenali Risiko Diabetes Anda Sejak Dini.<br>
            Gunakan sistem prediksi diabetes berbasis Machine Learning kami. Hanya dengan beberapa data kesehatan, Anda bisa mengetahui risiko diabetes Anda.
          </h5>
          <a href="#" class="btn btn-primary"><i class="ti ti-download"></i> Download Now</a>
        </div>
        <div class="col-md-6 col-xl-6 text-center">
          <img src="{{ asset('assets/admin/images/landing/diabetes.png') }}" alt="img" class="img-fluid">
        </div>
      </div>
    </div>
  </header>

  <!-- Tentang Aplikasi -->
  <section>
    <div class="container text-center">
      <h1 class="text-primary">TENTANG APLIKASI</h1>
      <h2 class="my-3">Kenapa Memilih Aplikasi Kami?</h2>

      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('assets/admin/images/landing/img-feature1.svg') }}" class="img-fluid" alt="">
              <h5 class="my-3">Akurasi Tinggi</h5>
              <p class="text-muted">Menggunakan teknologi Machine Learning dengan data riil untuk hasil prediksi yang akurat.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('assets/admin/images/landing/img-feature2.svg') }}" class="img-fluid" alt="">
              <h5 class="my-3">Mudah Digunakan</h5>
              <p class="text-muted">Antarmuka sederhana yang mudah digunakan oleh semua kalangan.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('assets/admin/images/landing/img-feature3.svg') }}" class="img-fluid" alt="">
              <h5 class="my-3">Riwayat Prediksi</h5>
              <p class="text-muted">Hasil prediksi disimpan untuk pemantauan kesehatan jangka panjang.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Fitur Unggulan -->
  <section class="pt-5 bg-dark-section">
    <div class="container text-center">
      <h1 class="text-primary">FITUR UNGGULAN</h1>
      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="mb-3">Prediksi Diabetes Otomatis</h3>
              <p class="text-muted">Analisis data seperti tekanan darah, BMI, usia, dll untuk prediksi risiko diabetes secara otomatis.</p>
              <button class="btn btn-outline-light">Explore Documentation</button>
            </div>
            <div class="card-body pb-0 pe-0">
              <img src="{{ asset('assets/images/landing/img-demo1.jpg')}}" class="img-fluid w-100" alt="">
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="mb-3">Statistik & Visualisasi</h3>
              <p class="text-muted">Laporan statistik kasus dan prediksi, berguna bagi admin untuk evaluasi.</p>
              <button class="btn btn-light">View All Components</button>
            </div>
            <div class="card-body pb-0 pe-0">
              <img src="{{ asset('assets/images/landing/img-demo2.jpg')}}" class="img-fluid w-100" alt="">
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h3 class="mb-3">Manajemen Data Pasien</h3>
              <p class="text-muted">Admin dapat mengelola data pasien langsung dari panel aplikasi.</p>
              <button class="btn btn-outline-light">Preview Figma <i class="ti ti-brand-figma"></i></button>
            </div>
            <div class="card-body pb-0 pe-0">
              <img src="{{ asset('assets/images/landing/img-demo3.jpg')}}" class="img-fluid w-100" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CARA KERJA -->
  <section>
    <div class="container text-center">
      <h1 class="text-primary">Cara Kerja Sistem Prediksi Diabetes</h1>
      <h2 class="my-3">Mudah & Cepat dalam 3 Langkah</h2>

      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('assets/admin/images/landing/img-feature1.svg') }}" class="img-fluid" alt="">
              <h5 class="my-3">Isi Data Pemeriksaan</h5>
              <p class="text-muted">Masukkan data kesehatan seperti usia, tekanan darah, BMI, glukosa, dan lainnya</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('assets/admin/images/landing/img-feature2.svg') }}" class="img-fluid" alt="">
              <h5 class="my-3">Klik Tombol Prediksi</h5>
              <p class="text-muted">Data akan diproses oleh sistem pintar (AI) untuk memprediksi risiko diabetes</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="{{ asset('assets/admin/images/landing/img-feature3.svg') }}" class="img-fluid" alt="">
              <h5 class="my-3">Lihat Hasil & Riwayat</h5>
              <p class="text-muted">Hasil prediksi langsung tampil dan otomatis disimpan dalam riwayat untuk dipantau</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>

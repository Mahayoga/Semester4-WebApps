@extends('layouts.admin.app')

@section('title', 'Menu Prediksi')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Form Prediksi Diabetes</h4>
    
        @csrf

        <div class="form-group mb-3">
            <label for="pregnancies" class="form-label">Jumlah Kehamilan</label>
            <input name="pregnancies" id="pregnancies" type="number" class="form-control" placeholder="Contoh: 2" required>
        </div>

        <div class="form-group mb-3">
            <label for="glucose" class="form-label">Kadar Glukosa</label>
            <input name="glucose" id="glucose" type="number" class="form-control" placeholder="Contoh: 120" required>
        </div>

        <div class="form-group mb-3">
            <label for="blood_pressure" class="form-label">Tekanan Darah</label>
            <input name="blood_pressure" id="blood_pressure" type="number" class="form-control" placeholder="Contoh: 70" required>
        </div>

        <div class="form-group mb-3">
            <label for="bmi" class="form-label">BMI</label>
            <input name="bmi" id="bmi" type="number" step="0.1" class="form-control" placeholder="Contoh: 26.5" required>
        </div>

        <div class="form-group mb-3">
            <label for="age" class="form-label">Umur</label>
            <input name="age" id="age" type="number" class="form-control" placeholder="Contoh: 35" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Prediksi Sekarang</button>
        </div>
    </form>
</div>
@endsection

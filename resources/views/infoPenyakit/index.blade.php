@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')
            <div class="container" >
                <div class="d-flex justify-content-center min-vh-100 align-items-center flex-column">
                    <h1 class="mb-4" style="color: #E1E48C">INFORMASI PENYAKIT TUBERKULOSIS</h1>
                    <div class="row">
                    <!-- Card for Pulmonary TB -->
            <div class="col-md-6 col-lg-4 mt-4">
                <div class="card mb-4 h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tuberkulosis Paru-Paru</h5>
                        <p class="card-text text-start">Penyakit sistem pernapasan yang disebabkan oleh infeksi bakteri <i>Mycobacterium tuberculosis.</i></p>
                        <p class="card-text"><strong>Gejala</strong></p>
                        <ul class="text-start">
                            <li>Batuk yang berlangsung lama 2 minggu</li>
                            <li>Batuk yang disertai darah</li>
                            <li>Nyeri dada saat bernapas atau batuk</li>
                            <li>Berkeringat di malam hari</li>
                            <li>Hilang nafsu makan</li>
                            <li>Penurunan berat badan</li>
                            <li>Demam dan menggigil</li>
                            <li>Mudah lelah</li>
                        </ul>
                    </div>
                </div>
            </div>
                   <!-- Card for Bone TB -->
            <div class="col-md-6 col-lg-4 mt-4">
                <div class="card mb-4 h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tuberkulosis Tulang</h5>
                        <p class="card-text">Tuberkulosis tulang, juga dikenal sebagai TB skeletal, adalah tuberkulosis yang mempengaruhi tulang dan sendi yang disebabkan oleh bakteri <i>Mycobacterium tuberculosis</i></p>
                        <p class="card-text"><strong>Gejala:</strong></p>
                        <ul class="text-start text-md-center">
                            <li>Hilang nafsu makan</li>
                            <li>Penurunan berat badan</li>
                            <li>Demam dan menggigil</li>
                            <li>Mudah lelah</li>
                            <li>Rasa nyeri pada tulang atau jaringan sendi</li>
                            <li>Bengkak pada bagian tulang/sendi abses</li>
                            <li>Kekakuan tulang belakang</li>
                            <li>Tulang belakang bungkuk</li>
                        </ul>
                    </div>
                </div>
            </div>
                       <!-- Card for Skin TB -->
            <div class="col-md-6 col-lg-4 mt-4 mb-4">
                <div class="card mb-4 h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Tuberkulosis Kulit</h5>
                        <p class="card-text">Tuberkulosis yang menyerang kulit. Skrofuloderma termasuk dalam penyakit infeksi kulit langka yang disebabkan oleh bakteri <i>Mycobacterium tuberculosis</i> dan <i>Mycobacterium atypical.</i></p>
                        <p class="card-text"><strong>Gejala:</strong></p>
                        <ul class="text-start text-md-center">
                            <li>Hilang nafsu makan</li>
                            <li>Penurunan berat badan</li>
                            <li>Demam dan menggigil</li>
                            <li>Mudah lelah</li>
                            <li>Kulit kemerahan berisi nanah</li>
                            <li>Terasa Gatal di area Lesi</li>
                            <li>Lesi Memerah kemudian menghitam</li>
                        </ul>
                    </div>
                </div>
            </div>  
        </div>
                    @auth
                    <a href="{{ route('konsultasi.index') }}">
                        <button class="btn fw-semibold fs-4  p-3" style="background-color: #427676; color: #A1CD73">Konsultasi</button>
                    </a>
                    @endauth
                </div>
            </div>
@endsection
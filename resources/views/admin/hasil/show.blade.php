@extends('layouts.main')
<div class="background-image">
  <img src="/image/1.png" alt="" style="position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;">
@section('content')
<style>
    .form-check-input-shadow {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
    }
  </style>
  <div class="container">
      <div class="d-flex justify-content-center min-vh-100 align-items-center">
        <div class="card form-check-input-shadow border-0 p-4" style="background-color: #427676">
          <div class="card-header border-0">
            <h1 class="card-title" style="color: #E1E48C">Riwayat Konsultasi</h1>
          </div>
            <div class="card-body ">
              <form action="{{ route('konsultasi.diagnosa') }}" method="POST">
                @csrf
                <h3 style="color: #E1E48C">Apa yang anda rasakan?</h3>
                @foreach ($results as $result)
                <table class="table">
                    <thead class="text-center fs-4">
                        <tr>
                            <th>TEST</th>
                            <th>TEST</th>
                            <th>TEST</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalBayes as $bayes)
                            <tr>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
              </form>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-center "> --}}
          {{ $results->links() }}
      {{-- </div> --}}
      </div>
    </div>
</div>
@endsection
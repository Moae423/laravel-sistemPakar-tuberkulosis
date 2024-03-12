<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Page</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .register-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 40px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        margin-top: 50px;
    }
    .tombol:hover {
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
    }
</style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <h2 class="text-center mb-4">Register</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" required>
            </div>
            <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenisKelamin" name="jenisKelamin" required>
                    <option value="" selected disabled>Choose...</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">No. HP</label>
                <input type="tel" class="form-control" id="nohp" name="nohp" required>
            </div>
            <div class="text-center">
            <button type="submit" class="tombol btn btn-primary btn-block w-100 p-3">Register</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

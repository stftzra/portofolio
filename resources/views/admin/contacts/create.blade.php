<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            background: linear-gradient(135deg, #ff99cc, #ffe6f2); /* Pink Gradient */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            padding: 40px;
            margin-top: 50px;
            animation: slideIn 0.8s ease-out;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ff66a3; /* Vibrant Pink */
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 0 0 10px rgba(255, 102, 163, 0.5);
        }

        /* Form Elements */
        .form-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            font-size: 1rem;
            border: 1px solid #ffcce0;
            padding: 12px;
            background-color: #ffe6f2;
            color: #333;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ff66a3; /* Vibrant Pink */
            box-shadow: 0 0 0 0.2rem rgba(255, 102, 163, 0.5);
        }

        textarea.form-control {
            resize: vertical;
        }

        .description-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #555;
        }

        /* Button Styles */
        .btn {
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #ff66a3; /* Vibrant Pink */
            border: none;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #e65591; /* Darker Pink */
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            color: #555;
        }

        .btn-secondary:hover {
            background-color: #e6e6e6;
            transform: scale(1.05);
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .container {
                padding: 25px;
            }

            h1 {
                font-size: 1.8rem;
            }
        }

        /* Slide-in animation */
        @keyframes slideIn {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tambah Kontak Baru</h1>
    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama lengkap">
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan email">
        </div>

        <!-- Phone Field -->
        <div class="mb-3">
            <label for="notelp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="notelp" name="notelp" required placeholder="Masukkan nomor telepon">
        </div>

        <!-- Description Field -->
        <div class="mb-3">
            <label for="description" class="description-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi kontak (opsional)"></textarea>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
    </form>
</div>

<!-- Bootstrap Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>

</body>
</html>

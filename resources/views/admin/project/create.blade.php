<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffe6f0;
            color: #333;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #e91e63;
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #e91e63;
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #f8bbd0;
            border-radius: 5px;
            font-size: 1rem;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button {
            background-color: #e91e63;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #d81b60;
        }
        .success {
            background-color: #f8bbd0;
            color: #880e4f;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            border: 1px solid #f48fb1;
        }
    </style>
</head>
<body>
    <h1>Tambah Proyek Baru</h1>

    @if(session('success'))
        <div class="success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Judul Proyek:</label>
            <input type="text" name="title" id="title" required value="{{ old('title') }}">
        </div>

        <div>
            <label for="description">Deskripsi:</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="tools">Alat/Tools (Opsional):</label>
            <input type="text" name="tools" id="tools" value="{{ old('tools') }}">
        </div>

        <div>
            <label for="image">Gambar (Opsional):</label>
            <input type="file" name="image" id="image">
        </div>

        <div>
            <button type="submit">Simpan Proyek</button>
        </div>
    </form>

    <a href="{{ route('admin.project.index') }}">Kembali ke Daftar Proyek</a>
</body>
</html>

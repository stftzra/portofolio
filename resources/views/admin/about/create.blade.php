<!-- resources/views/admin/about/create.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Halaman About</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff0f5; /* Light pink background */
        }
        header {
            background-color: #ff66b2; /* Pink header */
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        h1 {
            font-size: 36px;
        }
        .content {
            margin: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ff66b2; /* Pink border */
        }
        button {
            padding: 10px 20px;
            background-color: #ff66b2; /* Pink button */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff33cc; /* Darker pink on hover */
        }
        .back-link {
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            color: #ff66b2; /* Pink link */
            text-decoration: none;
            font-size: 1.1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .back-link a:hover {
            color: #ff33cc; /* Darker pink on hover */
            text-decoration: underline;
            transform: scale(1.1); /* Efek perbesar saat hover */
        }
    </style>
</head>
<body>
    <header>
        <h1>Buat Halaman About</h1>
    </header>

    <div class="content">
        <!-- Form untuk membuat halaman About baru -->
        <form action="{{ route('admin.about.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label for="content">Isi Konten</label>
                <textarea name="content" id="content" required>{{ old('content') }}</textarea>
            </div>

            <button type="submit">Simpan</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.about.index') }}">Kembali ke Halaman About</a>
        </div>
    </div>
</body>
</html>

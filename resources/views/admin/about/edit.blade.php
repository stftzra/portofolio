<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Halaman About</title>
    <style>
        /* Reset dan dasar styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Orbitron', sans-serif; /* Font cyberpunk */
            background: linear-gradient(45deg, #fff0f5, #ffcccb); /* Pink-White Gradient */
            color: #333;
            line-height: 1.6;
            padding: 0;
            overflow-x: hidden;
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Header */
        header {
            background-color: rgba(255, 105, 180, 0.8); /* Light Pink */
            color: white;
            text-align: center;
            padding: 40px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.7);
        }

        h1 {
            font-size: 3rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: neonGlow 2s ease-in-out infinite alternate;
        }

        @keyframes neonGlow {
            0% { text-shadow: 0 0 12px #ff66b2, 0 0 24px #ff66b2, 0 0 36px #ff66b2, 0 0 48px #ff66b2; }
            100% { text-shadow: 0 0 18px #ff33cc, 0 0 36px #ff33cc, 0 0 54px #ff33cc, 0 0 72px #ff33cc; }
        }

        /* Form Styling */
        .content {
            max-width: 850px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff; /* White background for form */
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 105, 180, 0.3);
            transition: transform 0.3s ease;
        }

        .content label {
            display: block;
            color: #ff66b2; /* Pink color */
            font-size: 1.1rem;
            margin-bottom: 8px;
            text-shadow: 0 0 4px #ff66b2;
        }

        .content input,
        .content textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 25px;
            background-color: #f8f8f8; /* Light pink background */
            border: 1px solid #ff66b2;
            border-radius: 8px;
            color: #333;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .content input:focus,
        .content textarea:focus {
            border-color: #ff33cc; /* Darker pink */
            outline: none;
            box-shadow: 0 0 10px #ff33cc;
        }

        .content textarea {
            height: 220px;
            resize: none;
        }

        button {
            width: 100%;
            padding: 18px;
            background-color: #ff66b2; /* Pink button */
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(255, 105, 180, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #ff33cc; /* Darker pink on hover */
            transform: translateY(-3px); /* Efek tombol terangkat */
        }

        /* Link styling */
        .back-link {
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            color: #ff66b2; /* Pink link */
            font-size: 1.1rem;
            text-decoration: none;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: #ff33cc; /* Darker pink on hover */
            text-decoration: underline;
            transform: scale(1.1); /* Efek perbesar saat hover */
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.2rem;
            }

            .content {
                padding: 20px;
            }

            button {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Edit Halaman About</h1>
    </header>

    <div class="content">
        <!-- Form untuk mengedit halaman About -->
        <form action="{{ route('admin.about.update', $about->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $about->title) }}" required>
            </div>

            <div>
                <label for="content">Isi Konten</label>
                <textarea name="content" id="content" required>{{ old('content', $about->content) }}</textarea>
            </div>

            <button type="submit">Update</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.about.index') }}">Kembali ke Halaman About</a>
        </div>
    </div>

</body>
</html>

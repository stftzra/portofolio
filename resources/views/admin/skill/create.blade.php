<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Skill</title>
    <style>
        body {
            background-color: #ffffff; /* Warna latar belakang putih */
            color: #ff007f; /* Warna teks pink */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            background-color: #ffe6f0; /* Warna latar belakang kontainer pink muda */
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 5px 30px rgba(255, 0, 127, 0.3); /* Bayangan pink */
            margin: auto;
            transition: transform 0.3s;
        }

        .container:hover {
            transform: scale(1.01);
        }

        h1 {
            text-align: center;
            color: #ff007f; /* Warna teks pink utama */
            margin-bottom: 30px;
            font-size: 2.5em;
            font-weight: 600;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #ff1493; /* Warna pink cerah untuk label */
        }

        .form-control {
            background-color: #ffccdf; /* Latar belakang input pink lembut */
            color: #ff007f; /* Teks pink */
            border: 1px solid #ff007f; /* Border pink */
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            margin-bottom: 20px;
            transition: border-color 0.3s;
            font-size: 1em;
            box-sizing: border-box;
            resize: none;
        }

        .form-control::placeholder {
            color: #ff80b0; /* Placeholder pink terang */
        }

        .form-control:focus {
            border-color: #ff1493;
            outline: none;
            background-color: #ffb3cf; /* Latar belakang saat fokus */
        }

        .btn-success {
            background-color: #ff007f; /* Warna tombol pink */
            color: #ffffff; /* Teks putih */
            border: none;
            border-radius: 5px;
            padding: 15px;
            width: 90%;
            margin-left: 5%;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 10px;
        }

        .btn-success:hover {
            background-color: #e60073; /* Warna tombol saat hover lebih gelap */
            transform: translateY(-2px);
        }

        .form-group {
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }

            .btn-success {
                padding: 12px;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Create Skill</h1>

        <form action="{{ route('skill.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Skill Name</label>
                <input type="text" name="name" class="form-control" required placeholder="Enter skill name">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter skill description" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Create Skill</button>
        </form>
    </div>
</body>

</html>

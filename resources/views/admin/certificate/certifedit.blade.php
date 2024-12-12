<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Certificate</title>
    <style>
        /* Body Style */
        body {
            background-color: #fce4ec; /* Soft pink background */
            color: #880e4f; /* Dark pink text */
            font-family: 'Arial', sans-serif; /* Standard font */
            margin: 0;
            padding: 20px;
        }

        /* Container Style */
        .container {
            max-width: 600px;
            background-color: #f8bbd0; /* Light pink container */
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 5px 30px rgba(173, 20, 87, 0.5); /* Pink shadow */
            margin: auto;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02); /* Zoom effect on hover */
        }

        /* Heading */
        h1 {
            text-align: center;
            color: #ad1457; /* Bold pink */
            font-size: 2.5em;
            margin-bottom: 30px;
            font-weight: bold;
            text-shadow: 3px 3px 10px rgba(173, 20, 87, 0.7); /* Glow effect */
        }

        /* Form Label */
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #880e4f; /* Dark pink */
        }

        /* Form Input Control */
        .form-control {
            background-color: #fff; /* White background */
            color: #880e4f; /* Dark pink text */
            border: 1px solid #ad1457; /* Bold pink border */
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
            font-size: 1em;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .form-control:focus {
            border-color: #c2185b; /* Darker pink on focus */
            outline: none;
            background-color: #f1f1f1; /* Light background on focus */
        }

        /* Button */
        button[type="submit"] {
            background-color: #ad1457; /* Bold pink */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 15px;
            width: 100%;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.2em;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button[type="submit"]:hover {
            background-color: #c2185b; /* Darker pink on hover */
            transform: translateY(-2px); /* Button lift effect */
        }

        /* File Input */
        .form-group small {
            color: #880e4f; /* Dark pink for text */
            font-size: 0.9em;
        }

        .form-group .file-link {
            color: #ad1457; /* Bold pink link */
        }

        .form-group .file-link:hover {
            color: #c2185b; /* Darker pink on hover */
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 2em;
            }

            button[type="submit"] {
                padding: 12px;
                font-size: 1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Certificate</h1>

        <form action="{{ route('admin.certificate.update', $certif->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">Certificate Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $certif->name) }}" required>
            </div>

            <div class="form-group">
                <label for="issued_by" class="form-label">Issued By</label>
                <input type="text" id="issued_by" name="issued_by" class="form-control" value="{{ old('issued_by', $certif->issued_by) }}" required>
            </div>

            <div class="form-group">
                <label for="issued_at" class="form-label">Issued At</label>
                <input type="date" id="issued_at" name="issued_at" class="form-control" value="{{ old('issued_at', $certif->issued_at) }}" required>
            </div>

            <div class="form-group">
                <label for="file" class="form-label">Certificate File</label>
                <input type="file" id="file" name="file" class="form-control">
                <small>Current file: <a href="{{ asset('storage/' . $certif->file) }}" target="_blank" class="file-link">View Certificate</a></small>
            </div>

            <button type="submit">Update Certificate</button>
        </form>
    </div>
</body>

</html>

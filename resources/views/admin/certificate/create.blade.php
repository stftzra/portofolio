<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Certificate</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fce4ec; /* Soft pink background */
            color: #880e4f; /* Dark pink text */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container Styles */
        .container {
            background: linear-gradient(135deg, #f8bbd0, #fce4ec); /* Gradient background */
            border: 1px solid #ad1457; /* Bold pink border */
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(173, 20, 87, 0.5); /* Pink glow */
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #ad1457; /* Bold pink */
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 8px rgba(173, 20, 87, 0.7); /* Glow effect */
        }

        /* Form Styles */
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #880e4f; /* Dark pink */
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ad1457; /* Bold pink border */
            background-color: #fff; /* White background */
            color: #880e4f; /* Dark pink text */
            font-size: 14px;
            margin-bottom: 20px;
        }

        .form-control:focus {
            outline: none;
            border-color: #c2185b; /* Darker pink on focus */
            box-shadow: 0 0 8px rgba(173, 20, 87, 0.8); /* Glow effect */
        }

        /* Button Styles */
        .btn-primary {
            width: 100%;
            background-color: #ad1457; /* Bold pink */
            color: #fff; /* White text */
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #c2185b; /* Darker pink on hover */
            transform: translateY(-2px); /* Lift effect */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Certificate</h1>

        <!-- Form to create a new certificate -->
        <form action="{{ route('admin.certificate.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for security -->

            <div class="mb-3">
                <label for="name" class="form-label">Certificate Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="issued_by" class="form-label">Issued By</label>
                <input type="text" class="form-control" id="issued_by" name="issued_by" required>
            </div>

            <div class="mb-3">
                <label for="issued_at" class="form-label">Issued At</label>
                <input type="date" class="form-control" id="issued_at" name="issued_at" required>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Certificate File</label>
                <input type="file" class="form-control" id="file" name="file" accept="application/pdf, image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Certificate</button>
        </form>
    </div>
</body>
</html>

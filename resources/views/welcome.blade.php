<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Portfolio</title>

    <!-- Logo -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', sans-serif;
            background-color: #ffffff;
            color: #ff69b4;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.dark-mode {
            background-color: #333;
            color: #ff69b4;
        }

        /* Navbar Styles */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 2px solid #ff69b4;
            box-shadow: 0px 4px 10px rgba(255, 105, 180, 0.3);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: background 0.3s ease;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 700;
            color: #ff69b4;
        }

        .menu {
            display: flex;
            gap: 1rem;
            padding-left: 2rem;
        }

        a {
            color: #ff69b4;
            text-decoration: none;
            font-weight: 600;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        a:hover {
            color: #ffffff;
            border: 2px solid #ff69b4;
            box-shadow: 0 4px 10px rgba(255, 105, 180, 0.6);
            background-color: rgba(255, 105, 180, 0.1);
        }

        .dark-mode-toggle {
            cursor: pointer;
            padding: 0.6rem 1rem;
            background-color: #ff69b4;
            color: #ffffff;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .dark-mode-toggle:hover {
            background-color: #ffffff;
            color: #ff69b4;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.6);
        }

        main {
            margin-top: 5rem;
            padding: 2rem;
            text-align: center;
            color: #ff69b4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        body.dark-mode main {
            color: #ffffff;
        }

        footer {
            margin-top: 2rem;
            padding: 1rem;
            color: #ff69b4;
            text-align: center;
        }

        /* Image Styles */
        .portfolio-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            margin-top: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(255, 105, 180, 0.3);
            object-fit: cover;
        }

        /* Image Upload Form */
        .image-upload {
            margin-top: 2rem;
            text-align: center;
        }

        .image-upload label {
            display: block;
            font-size: 1.2rem;
            font-weight: bold;
            color: #ff69b4;
            margin-bottom: 1rem;
        }

        .image-upload input[type="file"] {
            padding: 0.6rem 1rem;
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .image-upload input[type="file"]:hover {
            background-color: #ffffff;
            color: #ff69b4;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">My Portfolio</div>
        @if (Route::has('login'))
            <div class="menu">
                <a href="{{ route('home.index') }}">Home</a>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <button class="dark-mode-toggle" onclick="toggleDarkMode()">Toggle Mode</button>
    </nav>

    <main>
        <h1>Welcome to My Portfolio</h1>
        <p>This is a pink-and-white themed responsive navbar interface.</p>

        <!-- Add Image here -->
        <div class="image-upload">
            <label for="portfolioImage">Upload a photo:</label>
            <input type="file" id="portfolioImage" accept="image/*" onchange="displayImage(event)">
        </div>

        <img id="uploadedImage" class="portfolio-image" style="display: none;" />

        <!-- Add Name and Class -->
        <div class="personal-info">
            <h2>Name: SITI FATIMAH AZZAHRA</h2>
            <h3>Class: Web Development : 11 PPLG 3</h3>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 My Portfolio</p>
    </footer>

    <script>
        // Check if there is an image stored in localStorage
        window.onload = function() {
            if (!window.localStorage) {
                console.error("Local storage is not supported!");
                return;
            }
            const storedImage = localStorage.getItem('uploadedImage');
            if (storedImage) {
                const image = document.getElementById('uploadedImage');
                image.src = storedImage;
                image.style.display = 'block';
            }
        };

        // Dark Mode Toggle
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }

        // Display Image after Upload
        function displayImage(event) {
            const image = document.getElementById('uploadedImage');
            const file = event.target.files[0];

            if (file && file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                    image.style.display = 'block';

                    // Store the uploaded image in localStorage
                    localStorage.setItem('uploadedImage', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                alert("Please select a valid image file.");
            }
        }
    </script>
</body>
</html>

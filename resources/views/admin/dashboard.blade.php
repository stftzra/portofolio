<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #ff79c6, #f8a1d1); /* Pink gradient background */
            color: #ffffff; /* White text */
            display: flex;
            min-height: 100vh;
            transition: background-color 0.5s ease, color 0.5s ease;
        }

        .sidebar {
            width: 260px;
            background-color: #ff79c6; /* Pink background */
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            border-right: 2px solid #f8a1d1; /* Light pink border */
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.2);
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #ffffff;
            padding: 14px;
            text-decoration: none;
            margin: 15px 0;
            border-radius: 8px;
            font-size: 18px;
            transition: all 0.3s;
        }

        .sidebar a i {
            margin-right: 12px;
            font-size: 1.3rem;
        }

        .sidebar a:hover {
            background: #ffffff;
            color: #ff79c6;
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
            width: calc(100% - 260px);
            display: flex;
            flex-direction: column;
            gap: 30px;
            background-color: #ffffff;
            color: #ff79c6;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .header {
            background-color: #f8a1d1;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 2rem;
            border-radius: 8px;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .button {
            padding: 12px 20px;
            background-color: #ff79c6;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .button:hover {
            background-color: #f8a1d1;
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            color: #ff79c6;
        }

        th, td {
            border: 2px solid #f8a1d1;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #ff79c6;
            color: #ffffff;
            text-transform: uppercase;
        }

        tr {
            background-color: #f8a1d1;
            transition: background-color 0.3s;
        }

        tr:hover {
            background-color: #ffdee4;
        }

        .light-mode {
            background-color: #ffffff;
            color: #ff79c6;
        }

        .light-mode .sidebar {
            background-color: #ffdee4;
            color: #ff79c6;
        }

        .light-mode .sidebar a {
            color: #ff79c6;
        }

        .light-mode .sidebar a:hover {
            background-color: #ffffff;
            color: #ff79c6;
        }

        .light-mode .header {
            background-color: #ffdee4;
            color: #ff79c6;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.about.index') }}"><i class="fas fa-info-circle"></i> About</a>
        <a href="{{ route('admin.project.index') }}"><i class="fas fa-project-diagram"></i> Project</a>
        <a href="{{ route('skill.index') }}"><i class="fas fa-pencil-alt"></i> Edit Skill</a>
        <a href="{{ route('admin.certificate.index') }}"><i class="fas fa-scroll"></i> Certificate</a>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary"><i class="fas fa-address-book"></i> Lihat Kontak</a>
        <a href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <div class="main-content">
        <div class="header">
            Welcome to Admin Dashboard
            <div class="toggle-btn" id="theme-toggle">
                <i class="fas fa-moon"></i>
            </div>
        </div>

        <!-- Your content goes here -->

    </div>

    <!-- SweetAlert2 CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('theme-toggle').addEventListener('click', function () {
            document.body.classList.toggle('light-mode');
            let icon = this.querySelector('i');
            
            icon.classList.toggle('fa-moon');
            icon.classList.toggle('fa-sun');
            icon.style.transition = 'transform 0.8s ease';
            icon.style.transform = document.body.classList.contains('light-mode') ? 'rotate(360deg)' : 'rotate(-360deg)';
            
            Swal.fire({
                title: document.body.classList.contains('light-mode') ? 'Light Mode Activated!' : 'Dark Mode Activated!',
                icon: 'info',
                iconColor: '#4cc9f0',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4cc9f0',
                background: document.body.classList.contains('light-mode') ? '#e0e1dd' : '#1b263b',
                color: document.body.classList.contains('light-mode') ? '#1b263b' : '#e0e1dd',
                showClass: { popup: 'animate__animated animate__fadeInDown' },
                hideClass: { popup: 'animate__animated animate__fadeOutUp' },
                backdrop: 'rgba(0, 0, 0, 0.4)',
            });
        });

        window.onload = function() {
            Swal.fire({
                title: 'Welcome Back, Sir!',
                text: 'You can manage your data from here!',
                icon: 'success',
                confirmButtonText: 'Let\'s Go!',
                background: '#1b263b',
                color: '#e0e1dd',
                iconColor: '#4cc9f0',
                confirmButtonColor: '#4cc9f0',
                backdrop: 'rgba(0, 0, 0, 0.5)',
                showClass: { popup: 'animate__animated animate__fadeInDown' },
                hideClass: { popup: 'animate__animated animate__fadeOutUp' },
            });
        };
    </script>
</body>
</html>

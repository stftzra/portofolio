<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
            line-height: 1.6;
            overflow-x: hidden;
            padding-top: 60px;
            background: linear-gradient(45deg, #FFF, #FFC0CB);
            background-size: 400% 400%;
            animation: gradientBackground 10s ease infinite;
        }

        /* Gradient Background Animation */
        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Typography */
        h1, h2, h3 {
            font-weight: 600;
            color: #000;
            text-align: center;
        }

        p {
            font-weight: 300;
            color: #333;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Header */
        header {
            background-color: #FFE6E6;
            color: #000;
            padding: 120px 20px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 4em;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        header p {
            font-size: 1.5em;
            color: #555;
        }

        /* Navbar Styles */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #FFE6E6;
            z-index: 100;
            padding: 20px 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 25px;
        }

        nav ul li a {
            font-size: 1.2em;
            font-weight: 600;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        nav ul li a:hover {
            color: #FF69B4;
            transform: translateY(-2px);
        }

        /* Section Styling */
        section {
            padding: 80px 20px;
            text-align: center;
        }

        section h2 {
            font-size: 3em;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        section p {
            font-size: 1.2em;
            color: #555;
            line-height: 1.7;
        }

        /* Cards Styling */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }

        .card {
            background-color: #FFC0CB;
            border: 2px solid #FF69B4;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: auto;
            border-bottom: 2px solid #FF69B4;
        }

        .card h3 {
            font-size: 1.5em;
            color: #000;
            margin: 15px 0;
        }

        .card p {
            font-size: 1em;
            color: #333;
            margin: 10px 0;
        }

        .card a {
            display: inline-block;
            padding: 12px 20px;
            background-color: #FF69B4;
            color: #FFF;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .card a:hover {
            background-color: #FF1493;
            transform: scale(1.1);
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                align-items: center;
            }
        }

    </style>

</head>
<body>

    <!-- Header -->
    <header>
        <h1>MY PORTFOLIO</h1>
        <p>Web Developer | Programmer</p>
    </header>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#certificates">Certificates</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- About Section -->
    <section id="about">
        @foreach($about as $ab)
        <h2>{{$ab->title}}</h2>
        <p>{{$ab->content}}</p>
        @endforeach
    </section>

     <!-- Skills Section -->
    <section id="skills">
         <h2>My Skills</h2>
         <div class="card-container">
              @foreach($skill as $sk)
              <div class="card">
              <h3>{{ $sk->name }}</h3>
              <p>{{ $sk->description }}</p>
            </div>
         @endforeach
    </div>
</section>


   <!-- Projects Section -->
<section id="projects">
    <h2>My Projects</h2>
    <div class="card-container">
        @foreach($project as $pr)
        <div class="card">
            <!-- Menggunakan path yang benar ke file di public/storage -->
            <a href="{{ asset('storage/'.$pr->image_path) }}" target="_blank">
                <img src="{{ asset('storage/'.$pr->image_path) }}" alt="Project Image">
            </a>
            <h3>{{ $pr->title }}</h3>
            <p>{{ $pr->description }}</p>
            <p>{{ $pr->tools }}</p>
        </div>
        @endforeach
    </div>
</section>

   <!-- Certificates Section -->
<section id="certificates">
    <h2>My Certificates</h2>
    <div class="card-container">
        @foreach($certificate as $cert)
        <div class="card">
            <!-- Pastikan menggunakan path yang benar ke folder public/storage -->
            <a href="{{ asset('storage/'.$cert->file) }}" target="_blank">
                <img src="{{ asset('storage/'.$cert->file) }}" alt="Certificate">
            </a>
            <h3>{{ $cert->name }}</h3>
            <p>{{ $cert->issued_by }}</p>
            <p>{{ $cert->issued_at }}</p>
            <p>{{ $cert->description }}</p>
        </div>
        @endforeach
    </div>
</section>


 <!-- Contact Section -->
    <section id="contact" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 40px;">
         <h2 style="text-align: center; margin-bottom: 20px; color: #000;">Contact Me</h2>
          @foreach($contact as $con)
         <div class="card" style="background: linear-gradient(145deg, #FFC0CB, #FFFFFF); border-radius: 12px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); padding: 20px; max-width: 400px; text-align: center; margin-bottom: 20px;">
          <h3 style="font-size: 1.5em; color: #000;">{{$con->name}}</h3>
         <p style="font-size: 1.2em; color: #000;">{{$con->email}}</p>
         <p style="font-size: 1.2em; color: #000;">{{$con->notelp}}</p>
          <p style="font-size: 1em; color: #555;">{{$con->description}}</p>
      </div>
    @endforeach
</section>

</body>
</html>

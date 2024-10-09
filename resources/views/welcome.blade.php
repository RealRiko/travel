<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background: linear-gradient(to bottom, #f0f4f8, #dfe7ed);
        }

        .slideshow-container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.05); /* Subtle zoom-in effect */
            transition: opacity 1.5s ease-in-out, transform 1.5s ease-in-out;
        }

        .active {
            opacity: 1;
            transform: scale(1); /* Slight zoom-out to original size */
        }

        header {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        h1 {
            color: #2c3e50;
            font-size: 3.5rem; /* Smaller font size */
            margin: 0;
            text-align: center;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .text-background {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 25px; /* Smaller padding */
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 700px;
            text-align: center;
            backdrop-filter: blur(10px);
        }

        p {
            font-size: 1.4rem; /* Smaller font size */
            line-height: 1.6;
            margin: 20px 0;
            color: #34495e;
            font-weight: 500;
        }

        footer {
            background-color: rgba(255, 255, 255, 0.9); /* Add background to footer */
            text-align: center;
            padding: 15px 0;
            border-top: 1px solid #e5e7eb;
            position: relative;
            z-index: 2;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2); /* Shadow effect for the footer */
        }

        .footer-text {
            color: #4b5563;
            font-size: 1.1rem; /* Slightly smaller font size */
            font-weight: 500;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px; /* Smaller button size */
            background-color: #4f46e5;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #4338ca;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="slideshow-container">
        <div class="slide active" style="background-image: url('/images/New_york_times_square-terabass.jpg.webp');"></div>
        <div class="slide" style="background-image: url('/images/image.png');"></div>
        <div class="slide" style="background-image: url('/images/shutterstock-490898872.webp');"></div>
    </div>

    <header>
        <h1>Welcome to Aviosales</h1>
    </header>

    <div class="container">
        <div class="text-background">
            <p>Your adventure starts here!</p>
            <a href="{{ route('destinations.index') }}" class="btn">Explore Destinations</a>
        </div>
    </div>

    <footer>
        <p class="footer-text">© {{ date('Y') }} Your Company. All rights reserved.</p>
    </footer>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) {
                    slide.classList.add('active');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 5000); // Change slide every 5 seconds
    </script>
</body>
</html>

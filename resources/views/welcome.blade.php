<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        color: #f4f4f4;
        height: 100vh; /* Full viewport height */
        overflow: hidden; /* No scrolling */
    }

    .slideshow-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh; /* Full viewport height */
        overflow: hidden;
        z-index: -1;
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
        transition: opacity 1.5s ease-in-out;
    }

    .active {
        opacity: 1;
    }

    header {
        text-align: center;
        padding: 20px;
        background-color: rgba(15, 32, 39, 0.8);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
        position: sticky;
        top: 0;
        z-index: 2;
        width: 100%;
    }

    header h1 {
        margin: 0;
        font-size: 2.8rem;
        color: #f7b733;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .text-background {
        background: rgba(255, 255, 255, 0.15);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        max-width: 600px;
        margin: 0 auto;
        backdrop-filter: blur(8px);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .text-background p {
        font-size: 1.3rem;
        line-height: 1.6;
        color: #f4f4f4;
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 12px 30px;
        background-color: #f7b733;
        color: #0f2027;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 8px;
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(247, 183, 51, 0.6);
    }

    footer {
        text-align: center;
        padding: 8px 15px;
        background-color: rgba(15, 32, 39, 0.9);
        color: #e4e4e4;
        font-size: 0.8rem;
        box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.5);
        position: absolute;
        bottom: 10px; /* Adjusted the position to be slightly above the very bottom */
        left: 50%;
        transform: translateX(-50%);
        width: auto; /* Keeps it at a smaller width */
        max-width: 300px; /* Limits the width to give a more square appearance */
        border-radius: 10px;
    }
</style>

</head>
<body>
<div class="slideshow-container">
    <div class="slide active" style="background-image: url('/images/destinations/dubai.jpg');"></div>
    <div class="slide" style="background-image: url('/images/destinations/rome.jpg');"></div>
    <div class="slide" style="background-image: url('/images/destinations/newyork.jpg');"></div>
    <div class="slide" style="background-image: url('/images/destinations/tokyo.jpg');"></div>
    <div class="slide" style="background-image: url('/images/destinations/sydney.jpg');"></div>
    <div class="slide" style="background-image: url('/images/destinations/bangkok.jpg');"></div>
    <div class="slide" style="background-image: url('/images/destinations/riga.jpg');"></div>
</div>


    <header>
        <h1>Aviosales</h1>
    </header>

    <div class="text-background">
        <p>Your next journey begins here. Discover incredible destinations and make unforgettable memories.</p>
        <a href="{{ route('destinations.index') }}" class="btn">Explore Destinations</a>
    </div>

    <footer>
        <p>© {{ date('Y') }} Aviosales. Designed for adventure.</p>
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

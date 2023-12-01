<!-- home.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <meta name="description" content="Welcome to the Home Page of BFP Cabuyao. Explore our mission and vision, and learn more about our commitment to fire safety. Visit our Facebook Page for more infos.">

    <style>
        body {
            overflow: hidden;
        }

        section {
            overflow-x: hidden;
        }
    </style>

    <link rel="preload" href="{{ asset('image/bg-about.webp') }}" as="image">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>
<body>
    <div class="top-nav">
        <div class="icons">
            <div class="icons-container">
                <a href="https://www.facebook.com/bfp.cabuyao" aria-label="Visit our Facebook Page" title="Visit our Facebook Page">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>

            <div class="icons-container user-login">
                <a href="{{ url('/login') }}" aria-label="Login" title="Login">
                    <i class="fa-regular fa-circle-user"></i>
                </a>
            </div>
        </div> 
    </div>
    <section class="banner-area">
        <img src="image/banner.webp" alt="Image" class="img-fluid"> 
    </section><br>

    <section id="home">
        <div class="container">
            <div class="row">
                <div class="carousel-container">
                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('image/bfp1.webp') }}" alt="Image 1" class="d-block w-100">
                                <div class="overlay"></div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('image/bfp2.webp') }}" alt="Image 2" class="d-block w-100">
                                <div class="overlay"></div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('image/bfp3.webp') }}" alt="Image 3" class="d-block w-100">
                                <div class="overlay"></div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('image/bfp4.webp') }}" alt="Image 4" class="d-block w-100">
                                <div class="overlay"></div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('image/bfp5.webp') }}" alt="Image 5" class="d-block w-100">
                                <div class="overlay"></div>
                            </div>
                        </div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#imageCarousel" data-slide-to="1"></li>
                            <li data-target="#imageCarousel" data-slide-to="2"></li>
                            <li data-target="#imageCarousel" data-slide-to="3"></li>
                            <li data-target="#imageCarousel" data-slide-to="4"></li>
                        </ol>
                    </div>   
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="about-content">
        
                        <h4 class="text-center">Mission</h4>
                        <hr class="section-line">
                        <p class="text-center">We commit to design, implement, and enforce proactive measures to prevent and suppress destructive fires, investigate their causes, enforce fire codes and related laws, and respond to man-made and natural disasters and other emergencies.</p>
                        <h4 class="text-center">Vision</h4>
                        <hr class="section-line">
                        <p class="text-center">A modern fire service, thoughtfully designed, fully capable of ensuring a fire-safe nation by 2034 through innovative strategies, cutting-edge technology, and unwavering commitment.</p>
                        
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="map-wrapper">
                        <img src="{{ asset('image/about-bg.webp') }}" alt="">
                        <div class="map-overlay">
                            <a href="{{ url('/map') }}" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass-location"></i>  Click here to view map</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>

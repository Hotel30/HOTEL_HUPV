<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Barra de Navegación -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="img/logo.png" alt="Logo" class="logo-image">
                HUPV
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('hotel') }}">Hoteles</a></li>
                <li><a href="#">Sobre nosotros</a></li>
                <li><a href="{{ route('contacto') }}">Contacto</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- Encabezado Principal -->
    <section class="hero">
        <div class="slider">
            <div class="slide" style="background-image: url('img/hotel.jpg');">
                <h1>Experience Luxury Beyond Ordinary</h1>
                <p>Book your dream stay today!</p>
                <button>Explore</button>
            </div>
            <div class="slide" style="background-image: url('img/hotel5.jpg');">
                <h1>Relax and Unwind</h1>
                <p>Find your perfect getaway</p>
                <button>Discover More</button>
            </div>
            <div class="slide" style="background-image: url('img/hotel3.jpg');">
                <h1>Relax and Unwind</h1>
                <p>Find your perfect getaway</p>
                <button>Discover More</button>
            </div>
            <div class="slide" style="background-image: url('img/hotel2.jpg');">
                <h1>Relax and Unwind</h1>
                <p>Find your perfect getaway</p>
                <button>Discover More</button>
            </div>
        </div>
    </section>

    <!-- seccion de contacto-->
    
    <div class="contact-section">
        <div class="form-section">
          <h2>Send Us an Email</h2>
          <form action="#" method="post">
            <div class="form-row">
              <input type="text" name="first_name" placeholder="First Name *" required>
              <input type="text" name="last_name" placeholder="Last Name *" required>
            </div>
            <div class="form-row">
              <input type="email" name="email" placeholder="Your Email ID *" required>
              <input type="tel" name="phone" placeholder="Phone Number *" required>
            </div>
            <textarea name="message" rows="4" placeholder="Message"></textarea>
            <button type="submit">Submit Now</button>
          </form>
        </div>
        <div class="contact-info">
          <h2>Contact Info</h2>
          <p><i class="fa fa-map-marker"></i> St Amsterdam Finland,<br>United States of AKY16 8PN</p>
          <p><i class="fa fa-phone"></i> 1234567890</p>
          <p><i class="fa fa-envelope"></i> info@hotelbooking.com</p>
          <div class="social-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      
        <!-- Pie de página -->
    <footer class="footer">
        <div class="footer-top">
            <div class="contact-info">
                <p>CALL US</p>
                <span>123 456 7890</span>
            </div>
            <div class="contact-info">
                <p>EMAIL US</p>
                <span>info@HUPV.com</span>
            </div>
            <div class="newsletter">
                <p>ENTER ID FOR NEWSLETTER</p>
                <input type="text" placeholder="Your Email">
                <button>GO</button>
            </div>
            <!--<div class="social-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>-->
        </div>
    </footer>


    <!-- Vincula el script aquí -->
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>

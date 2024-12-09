<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="{{ asset('/css/hotel.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
                <li><a href="{{ route('contacto') }}">Contacto</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>
    </header>
        
      
    <!-- Sección de info hoteles -->
    <div class="hotels-section">
        <h1>Hoteles en Mexico</h1>
        <div class="hotel-card">
            <img src="img/hotel.jpg" alt="Hotel Monterrey Macroplaza" class="hotel-image">
            <div class="hotel-info">
                <div class="popular-tag">Opción popular</div>
                <h2>Hotel Luna</h2>
                <p>⭐⭐⭐⭐ Hotel</p>
                <p>a 1.2 km de: Centro de la ciudad</p>
                <p class="rating">7.7 - Bueno (11551)</p>
            </div>
            <div class="price-info">
                <p class="price">$1,095 <span>por noche</span></p>
                <p>Precio previsto para:</p>
                <p>nov 2024</p>
                <a href="{{ route('habitacion3') }}">
                <button class="price-button">Reservar</button>
                </a>
            </div>
        </div>

        <div class="hotel-card">
            <img src="img/hotel3.jpg" alt="Safi Royal Luxury Centro" class="hotel-image">
            <div class="hotel-info">
                <div class="popular-tag">Opción popular</div>
                <h2>Hotel Mar</h2>
                <p>⭐⭐⭐⭐⭐ Hotel</p>
                <p>a 0.3 km de: Centro de la ciudad</p>
                <p class="rating">8.6 - Excelente (13265)</p>
            </div>
            <div class="price-info">
                <p class="price">$1,055 <span>por noche</span></p>
                <p>Precio previsto para:</p>
                <p>nov 2024</p>
                <a href="{{ route('habitacion2') }}">
                <button class="price-button">Reservar</button>
                </a>
            </div>
        </div>

        <div class="hotel-card">
            <img src="img/hotel2.jpg" alt="Hotel Monterrey Macroplaza" class="hotel-image">
            <div class="hotel-info">
                <div class="popular-tag">Opción popular</div>
                <h2>Hotel Sol</h2>
                <p>⭐⭐⭐⭐ Hotel</p>
                <p>a 1.2 km de: Centro de la ciudad</p>
                <p class="rating">7.7 - Bueno (11551)</p>
            </div>
            <div class="price-info">
                <p class="price">$1,095 <span>por noche</span></p>
                <p>Precio previsto para:</p>
                <p>nov 2024</p>
                <a href="{{ route('habitacion') }}">
                <button class="price-button">Reservar</button>
                </a>
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

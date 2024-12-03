<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ofertas.css') }}">
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



       
    <section id="booking-form">
        <div class="booking-container">
            <h2>BOOK YOUR ROOMS</h2>
            <form>
                <div class="form-group">
                    <label for="arrival">ARRIVAL</label>
                    <input type="date" id="arrival">
                </div>
                <div class="form-group">
                    <label for="departure">DEPARTURE</label>
                    <input type="date" id="departure">
                </div>
                <div class="form-group">
                    <label for="rooms">1 ROOM</label>
                    <select id="rooms">
                        <option>1 Room</option>
                        <option>2 Rooms</option>
                        <option>3 Rooms</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="adults">1 ADULT</label>
                    <select id="adults">
                        <option>1 Adult</option>
                        <option>2 Adults</option>
                        <option>3 Adults</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="children">0 CHILD</label>
                    <select id="children">
                        <option>0 Child</option>
                        <option>1 Child</option>
                        <option>2 Children</option>
                    </select>
                </div>
                <button type="submit">BOOK</button>
            </form>
        </div>
    </section>
    
  <!-- Sección de ofertas -->
  <section class="hero">
    <div class="hero-content">
        <h1>Ahorra 30% o más con los Precios para socios. Reserva antes del 4 dic.</h1>
        <p>Ofertas para estas fechas: <strong>del 10 ene. al 12 ene.</strong></p>
        <button class="btn">Ver todas las ofertas</button>
    </div>
</section>
<section class="hotels">
    <div class="hotel-card">
        <img src="img/hotel.jpg" alt="CHN Hotel Monterrey">
        <h3>CHN Hotel Monterrey Norte, Trademark Collection</h3>
        <p class="rating">7.6 <span>Buena</span> (1,025 opiniones)</p>
        <p class="price">
            MXN$1,540 <span class="old-price">MXN$2,200</span>
        </p>
        <p class="total">por noche<br>MXN$3,665 en total impuestos y cargos incluidos</p>
        <button class="btn">Accede a un Precio para socios</button>
    </div>
    <div class="hotel-card">
        <img src="img/hotel2.jpg" alt="Safi Royal Luxury Centro">
        <h3>Safi Royal Luxury Centro</h3>
        <p class="rating">8.4 <span>Muy buena</span> (1,586 opiniones)</p>
        <p class="price">
            MXN$1,542 <span class="old-price">MXN$3,465</span>
        </p>
        <p class="total">por noche<br>MXN$3,670 en total impuestos y cargos incluidos</p>
        <button class="btn">Accede a un Precio para socios</button>
    </div>
    <div class="hotel-card">
        <img src="img/hotel3.jpg" alt="Radisson Hotel Monterrey">
        <h3>Radisson Hotel Monterrey San Jeronimo</h3>
        <p class="rating">8.2 <span>Muy buena</span> (1,000 opiniones)</p>
        <p class="price">
            MXN$1,750 <span class="old-price">MXN$2,500</span>
        </p>
        <p class="total">por noche<br>MXN$4,165 en total impuestos y cargos incluidos</p>
        <button class="btn">Accede a un Precio para socios</button>
    </div>
    <div class="hotel-card">
        <img src="img/hotel5.jpg" alt="Krystal Grand Suites Insurgentes">
        <h3>Krystal Grand Suites Insurgentes</h3>
        <p class="rating">9.0 <span>Magnífica</span> (1,129 opiniones)</p>
        <p class="price">
            MXN$1,856 <span class="old-price">MXN$2,856</span>
        </p>
        <p class="total">por noche<br>MXN$4,436 en total impuestos y cargos incluidos</p>
        <button class="btn">Accede a un Precio para socios</button>
    </div>
</section>
    <!-- Sección de Habitaciones -->
    <section id="rooms" class="rooms">
        <div class="section-title">
            <h2>Welcome to Hotel</h2>
            <p>Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum.</p>
        </div>
        <div class="room-grid">
            <!-- Habitaciones -->

            <div class="room">
                <div class="room-image" style="background-image: url('img/h2.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
            <div class="room">
                <div class="room-image" style="background-image: url('img/h3.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
    
            <div class="room">
                <div class="room-image" style="background-image: url('img/h4.jpg');">
                    <div class="room-hover-info">
                        <h3>Double Room</h3>
                        <p>Comfortable room with two double beds, perfect for families.</p>
                        <p class="price">$150 / night</p>
                    </div>
                </div>
                <h3>Double Room</h3>
                <p class="price">$150 / night</p>
                <button>Book</button>
            </div>
            
        </div>
</section>

    <!-- Sección de informacion -->
        <section id="facilities" class="facilities-section">
            <h2 class="section-title">Informacion</h2>
            <!-- Navegación de Tabs -->
            <ul class="tab-navigation">
                <li><a href="#Vision">Vision</a></li>
                <li><a href="#Sobre_nosotros">Sobre Nosotros</a></li>
                <li><a href="#Mision">Mision</a></li>
           
            </ul>
        
            <!-- Contenedor de Contenidos -->
            <div class="tab-content-container">

                <div id="Vision" class="tab-content active">
                    <img src="img/hotel1.jpg" alt="Vision">
                    <div class="text-content">
                        <h3>Vision</h3>
                        <p>
                            Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia.
                            <br>Service Hours: 19:00-22:00
                            <br>Service Charge: $15
                        </p>
                    </div>
                </div>
            
                <div id="Sobre_nosotros" class="tab-content">
                    <img src="img/hotel3.jpg" alt="Sobre_nosotros">
                    <div class="text-content">
                        <h3>Sobre Nosotros</h3>
                        <p>
                            Enjoy state-of-the-art facilities at our sports club.
                            <br>Service Hours: 06:00-22:00
                            <br>Membership Fee: $50/month
                        </p>
                    </div>
                </div>

                <div id="Mision" class="tab-content">
                    <img src="img/hotel5.jpg" alt="Mision">
                    <div class="text-content">
                        <h3>Mision</h3>
                        <p>
                            Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia.
                            <br>Service Hours: 19:00-22:00
                            <br>Service Charge: $15
                        </p>
                    </div>
                </div>
            </div>
        </section>

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

    <!--
    <div class="footer-bottom">
        <div class="footer-column">
            <h3>HUPV</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consectetur tincidunt dolor.</p>
            <p>St Amsterdam Finland, United States of AKY16 8PN</p>
        </div>
        <div class="footer-column">
            <h3>QUICK LINKS</h3>
            <ul>
                <li><a href="#">Rooms</a></li>
                <li><a href="#">Food & Drinks</a></li>
                <li><a href="#">Beach Venues</a></li>
                <li><a href="#">Amenities</a></li>
                <li><a href="#">Noordwijk</a></li>
                <li><a href="#">Wellness</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>WE ARE GLOBAL</h3>
            <img src="img/map.jpg" alt="World Map">
        </div>
    </div>
    <div class="footer-copyright">
        <p>&copy; 2015 HUPV. All rights reserved.</p>
    </div>
</footer>
    -->

    <!-- Vincula el script aquí -->
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
